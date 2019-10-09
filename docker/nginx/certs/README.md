# Installer root CA Widop

Sur Ubuntu installer certutil

`sudo apt install libnss3-tools`

Liste les certificats (chemin par défaut pour chrome)

`certutil -d sql:$HOME/.pki/nssdb -L`

Liste les certificats (chemin par défaut pour chromium snap)

`certutil -d sql:$HOME/snap/chromium/current/.pki/nssdb -L`

Télécharger les certificats sur 1Password : Dev Root CA

Les placer dans le dossier que vous voulez, exemple : ~/widop/certs

Ajouter le certificat

`certutil -d sql:$HOME/.pki/nssdb -A -t "C,," -n 'Widop rootCA dev' -i $HOME/widop/widop-certs/rootCA.pem`

Pour nettoyer le certificat:

`certutil -d sql:$HOME/.pki/nssdb -D -n 'Widop rootCA dev'`