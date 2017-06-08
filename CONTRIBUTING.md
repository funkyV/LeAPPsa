# Cum sa contribui

Repository-ul va contine branch-urile master(gata de productie), development(in curs de dezvoltare, urmatoarea
versiune pentru productie) si branch-uri tipul feature. Pentru a aduce adaugiri proiectului trebuie sa creati un nou branch din cel cu numele developement.

## Branch
Doar branch-ul development are ca parinte branch-ul master.
Branch-urile feature il au ca parinte pe development.
Inainte de a crea un branch incercati, pe cat posibil, ca branch-ul parinte sa fie up-to-date.

Pentru a crea un branch, folositi urmatoarele comenzi
````
    ~ $ # Aceasta comanda creaza un branch si apoi se muta pe acel branch
    ~ $ git checkout -b 'nume branch'
````

### Branch-ul Feature

Fiecare branch feature va contine cod pentru una sau mai multe functionalitati. Numele unui branch feature trebuie
respecte urmatorul format de nume feature/'nume branch', unde 'nume branch' este un nume sugestiv.
De exemplu:
````
    Numele unui branch de tip feature
    * feature/login 
    Va contine View-ul pentru login (pagina de login), partea de controller (spre ex.: LoginController) si partea de model (spre ex.: User).
````
Dupa ce terminati de lucrat la un feature, trebuie sa creati un pull request, pentru ca acesta sa fie merge-uit cu
branchul development.

## Commit-uri
Fiecare commit va avea un mesaj sugestiv.
Pentru a face commit se folosesc urmatoarele comenzi
````
    ~ $ git status
    ~ $ git add 'nume fisier'
        sau
    ~ $ git add . (aceasta adauga tot)
    
    ~ $ git commit -m "Mesajul sugestiv"

    ~ $ # Pentru branch-ul feature/login
    ~ $ git push origin feature/login
````

## Merge
Reamintim ca pentru orice merge dintre un branch de tipul feature si branch-ul development, se creaza pull request.

Exemplu de merge intre un branch feature(ex. feature/login) si branch-ul development
````
    ~ $ # Ne mutam pe branch-ul `feature/login`
    ~ $ git checkout feature/login

    ~ $ # Pe branch-ul feature/login, facem merge cu development
    ~ $ # (adica codul de pe branch-ul development il aducem pe branch-ul feature/login)
    ~ $ git merge development
    ~ $ # (se rezolva conflictele merge-ului, daca exista)

    ~ $ # Ne mutam pe branch-ul development
    ~ $ git checkout development

    ~ $ # Pe branch-ul development, facem merge cu feature/login
    ~ $ git merge feature/login
    ~ $ # (acum nu vor mai exista conflicte)
````

## Pull request-ul

Dupa ce ai terminat de lucrat la o mare parte din branch-ul tau, te rog sa creezi un pull request.
Poti face asta accesand pagina [LeAPPsa](https://github.com/funkyV/LeAPPsa/).
Aici trebuie sa iti selectezi branch-ul din drop-down-ul branches.
Dupa ce ai selectat branch-ul, apesi butonul "New pull request".
Scrii un mesaj frumos, ai grija ca base-ul sa fie
````    * master, daca la pasul anterior ai selectat development (vezi compare)
        sau
        * development, daca ai selectat un branch de tip feature (vezi compare)
````

### Mult spor si doamne ajuta!