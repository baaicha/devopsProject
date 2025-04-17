#!/bin/bash

SERVICE_IP=$(kubectl get service my-service -o jsonpath='{.spec.clusterIP}')
PORT=80
STATUS=$(curl -s -o /dev/null -w "%{http_code}" http://$SERVICE_IP:$PORT)

if [ "$STATUS" -eq 200 ]; then
  echo "Le service est accessible."
  exit 0
else
  echo " Le service n'est pas accessible."
  exit 1
fi