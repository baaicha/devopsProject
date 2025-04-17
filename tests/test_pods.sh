#!/bin/bash

# Vérifier l'état des Pods
PODS=$(kubectl get pods --no-headers | awk '{print $3}' | grep -v Running)

if [ -z "$PODS" ]; then
  echo "Tous les pods fonctionnent correctement."
  exit 0
else
  echo " Des pods ne fonctionnent pas correctement :"
  kubectl get pods
  exit 1
fi