#!/bin/bash

echo "Test de l'application Book-app"
URL="http://localhost:30007"

response=$(curl -s -o /dev/null -w "%{http_code}" $URL)

if [ $response -eq 200 ]; then
  echo "✅ Application accessible"
  exit 0
else
  echo "❌ Application inaccessible"
  exit 1
fi
