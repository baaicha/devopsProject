#!/bin/bash

# URL de test (à modifier selon ton NodePort ou LoadBalancer)
URL="http://localhost:8000"

# Test de contenu de la page
curl -s $URL | grep -q "Liste des Livres" && echo " Test OK" || echo " Test Échoué"
