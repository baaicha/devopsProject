# Projet Kubernetes - Gestion des Pods, Deployments et Services

## Prérequis :
- Kubernetes
- Docker
- Minikube (pour les tests locaux)
- Docker Hub (pour partager les images)

## Étapes du projet :

1. **Création d'un Deployment avec Kubernetes**
   - Commande : `kubectl apply -f deployment.yaml`

2. **Création d'un Service pour exposer l'application**
   - Commande : `kubectl apply -f service.yaml`
   
3. **Accès à l'application via Minikube**
   - Commande : `minikube service book-app-service`
