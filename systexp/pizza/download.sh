#!/bin/bash

echo "Starting download..."
scp -rv sepaehs@ssh-sepaehs.alwaysdata.net:/home/sepaehs/www/systexp/pizza/* .
echo "Download complete!"