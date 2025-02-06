#!/bin/bash

# Define color codes
GREEN='\033[0;32m'
CYAN='\033[0;36m'
RED='\033[0;31m'
NC='\033[0m' # No Color

# Print a message
echo -e "${CYAN}This script will download all contents inside the 'pizza' folder to the current directory.${NC}"

# Execute the scp command
scp -r sepaehs@ssh-sepaehs.alwaysdata.net:/home/sepaehs/www/* .

# Check the exit status of the command
if [ $? -eq 0 ]; then
    echo -e "${GREEN}Download successful! The contents of 'pizza' have been saved to the current directory.${NC}"
else
    echo -e "${RED}An error occurred during the download. Please check your connection or file path.${NC}"
fi
