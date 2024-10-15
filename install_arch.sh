#!/bin/bash

function is_installed() {
    if pacman -Qi $1 &>/dev/null; then
        echo -e "\033[32m$1 Yes it is installed.\033[0m"
    else
        echo -e "\nInstallation $1..."
        pacman -S $1 --noconfirm
    fi
}

function install() {
    clear

    is_installed "python"
    is_installed "python3"
    is_installed "php"
    is_installed "wget"

    echo -e "\nInstalling requierements..."
    pip3 install -r requirements.txt

    echo -e "\nInstall cloudflared..."
    python3 install_cfd.py

    echo -e "\n\033[32mComplete installation.\033[0m"
    echo -e "\n[~] Using the command: python3 doxxerX.py to remove the shell."
}

install
