#!/bin/bash

## Le but de ce script est de remettre certaines configurations
## du Raspberry à leurs valeurs par défaut.

# --------------------
# Variables
# --------------------

USERNAME=$(cat /root/username)
PASSWORD=$(cat /root/password)
backup_path="/root/backups"
date=$(date +"%y-%m-%d")


# --------------------
# Base de données
# --------------------
mysqldump --all-databases > $backup_path/backup_base-$date.sql -u $USERNAME -p$PASSWORD
mysql -u $USERNAME -p$PASSWORD berceuse < berceuse.sql

# --------------------
# Configuration Web
# --------------------


# --------------------
# Réseau
# --------------------



# --------------------
# Services
# --------------------


# --------------------
# GitHub
# --------------------
