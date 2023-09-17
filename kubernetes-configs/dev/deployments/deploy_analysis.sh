#!/bin/bash
kubectl delete deploy backend-website-mr --force
sleep 1
kubectl apply -f backend-website-mr-deployment.yml
podname=$(kubectl get po --field-selector=status.phase=Running -o jsonpath={.items[0].metadata.name})
echo "podname is $podname"
sleep 2
kubectl logs $podname -c injector-container