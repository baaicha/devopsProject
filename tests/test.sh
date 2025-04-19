#!/bin/bash

echo " Lancement du test d’accessibilité de l'application..."

# Redirige les ports du service (modifie le nom du service si nécessaire)
kubectl port-forward service/book-app-service 8000:80 &
PORT_FORWARD_PID=$!

sleep 5

# Test via curl (modifie la chaîne recherchée selon ta page d'accueil)
curl -s http://localhost:8000 | grep -q "Liste des Livres" && echo "Test OK" || (echo " Test échoué" && kill $PORT_FORWARD_PID && exit 1)

# Stopper le port-forward proprement
kill $PORT_FORWARD_PID
