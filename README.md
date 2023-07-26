### Merci de suivre ces étapes pour bien installer le projet
    Deux possibilitées s'offre à vous : 
##  Possibilité 1 : suivre ces étapes

```bash
    # cloner le projet
    git clone https://github.com/MarlyeCte/Test_Digipart_Marlye-Cotrie.git test_digipart_marlye-cotrie_symfony
```

```bash
    # rentrer dans le projet
    cd test_digipart_marlye-cotrie_symfony
```

```bash
    # crée la base de donnée
    bin/console d:d:c
```

```bash
    # lancer la migration
    bin/console do:migrations:migrate
```

```bash
    # création des fixtures
    bin/console doctrine:fixtures:load
```

##  Possibilité 2 : charger les données depuis le dump

    Vous pouvez changer le dump `db_digipart_test_symfony.sql` qui ce trouve à la racine du projet.