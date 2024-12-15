# --- Importation des modules python ---
from math import sqrt


# --- Définition des fonctions ---

    # Exercice 1

def somme(liste) :
    total = 0 
    # i = 0
    # while i < len(liste) :
    #     total += liste[i]
    #     i += 1
    
    for nbr in range(len(liste)) :
        total += liste[nbr]
    return total
# -----------------------------------------------------------------------------

    # Exercice 2

def pair(nbr) :
    if nbr % 2 == 0 :
        return True 
        ...
    elif nbr % 2 == 1 : 
        return False

# -----------------------------------------------------------------------------

    # Exercice 3

def maximum(n1, n2, n3) :
    max = 0

    # if n1 < n2 :
    #     return n2
    # elif n2 < n3 :
    #     return n3
    # else :
    #     return n1

    lst = [n1, n2, n3]

    maxi = 0

    for i in range(len(lst)) : 
        if lst[i] > maxi :
            maxi = lst[i]
    
    return maxi

# -----------------------------------------------------------------------------

    # Exercice 4

def indexMax(serie):
    maxi = 0
    index = 0
    for i in range(len(serie)) : 
        print(f"{i} {serie[i]}")
        if serie[i] > maxi :
            maxi = serie[i]
            index = i 
    return index

# -----------------------------------------------------------------------------

    # exercice 5

def nomMois(n) : 
    mois = [
    "Janvier", 
    "Février",
    "Mars",
    "Avril",
    "Mai",
    "Juin",
    "Juillet",
    "Août",
    "Septembre",
    "Octobre",
    "Novembre",
    "Décembre"
]
    if 1 <= n <= 12 :
        return mois[(n-1)]
    else : 
        return None

# -----------------------------------------------------------------------------

    # exercice 6 

def inverse(chaine) : 
    chaine = chaine[::-1]    
    return chaine

# -----------------------------------------------------------------------------

    # exercice 7 

def compteMots(phrase):
    compteur = 0 
    mots = phrase.split()
    for mot in mots :
        compteur += 1
    return compteur

# -----------------------------------------------------------------------------

    # exercice 8 

def occurrence(chaine, car) : 
    compteur = 0
    for i in range(len(chaine)) : 
        if chaine[i] == car :
            compteur += 1
    return compteur

# -----------------------------------------------------------------------------

    # exercice 9

def str2list(chaine) : 
    new_lst = []
    for i in range(len(chaine)) :
        new_lst.append(chaine[i])
    return new_lst

# -----------------------------------------------------------------------------

    # exercice 10

def find_num(matrix, nbre) : 
    compteur = 0
    for i in range(len(matrix)):
        for j in range(len(matrix[i])):
            if matrix[i][j] == nbre : 
                return (i, j)

# -----------------------------------------------------------------------------

    # exercice 11 

def grands_mots(liste, nbre) : 
    new_lst = []
    for i in range(len(liste)) :
        if len(liste[i]) > nbre :
            new_lst.append(liste[i])

    if new_lst == [] : 
        return None
    return new_lst

# -----------------------------------------------------------------------------

    # exercice 12 

def liste_paire(liste) :
    new_lst_pair = [] 
    for i in range(len(liste)) : 
        if i % 2 == 1 :
            new_lst_pair.append(liste[i] * 2)
        elif i % 2 == 0 :
            new_lst_pair.append(liste[i] // 2)
    return new_lst_pair

# -----------------------------------------------------------------------------

    # exercice 13 

def occ_liste(liste, car) : 
    new_lst = []
    for i in range(len(liste)) :
        compteur = 0 
        for j in range(len(liste[i])) :
            if liste[i][j] == car :
                compteur += 1
        new_lst.append(compteur)
    return new_lst

# -----------------------------------------------------------------------------

    #  Exercice 14

def stat_chiffres(nbre) : 
    nbr_str = str(abs(nbre))
    dictionaire = {}

    for chifre in nbr_str :
        if chifre in dictionaire :
            dictionaire[chifre] += 1
        else :
            dictionaire[chifre] = 1
    
    return dictionaire

# -----------------------------------------------------------------------------

    # Exercice 15 

def fibonacci(n) : 
    liste = [0, 1]

    for i in range(2, n) :
        next_fib = liste[-1] + liste[-2]
        liste.append(next_fib)
    return liste
        
# -----------------------------------------------------------------------------

    # Exercice 16

def diff_list(liste1, liste2) : 
    lst = []
    for i in range(len(liste1)) :
            new = liste1[i] - liste2[i] 
            lst.append(new)
    return lst

# -----------------------------------------------------------------------------

    # Exercice 17 

def distance(xa, ya, xb, yb) :
    #  d = √(x2−x1)2+(y2−y1)2. formule distance
    distance = sqrt(( xb - xa ) ** 2  +  ( yb - ya ) ** 2)

    return distance

# -----------------------------------------------------------------------------

    # Exercice 19

import math

def premier(n):
    if n < 2:
        return False
    for i in range(2, int(math.sqrt(n)) + 1):  # On vérifie jusqu'à sqrt(n), +1 pour inclure 5
        if n % i == 0:  # Si n est divisible par i, ce n'est pas premier
            return False
    return True  # Si aucun diviseur n'est trouvé, alors n est premier

# -----------------------------------------------------------------------------

    # Exercice 20

def npremier(n) :
    compteur = 0
    i = 2
    while True : 
        if premier(i) : # on verifie que i est premier donc on utlise la fonction premier qu'on a créé 
            compteur += 1
        if compteur == n :
            return i
        i += 1

# -----------------------------------------------------------------------------

    # Exercice 21

def swap(a, b):
    print("Avant l'échange : a =", a, "b =", b)
    a, b = b, a
    print("Après l'échange : a =", a, "b =", b)
    return a, b

# -----------------------------------------------------------------------------

    # Exercice 22

def checkindex(t, n) :
    for element in range(len(t)) : 
        if t[element] == n :
            return element
    return None
    

# -----------------------------------------------------------------------------

    # Exercice 23

def check0to10(t, n):
    for i in range(n):
        if 0 <= t[i] <= 10:
            return True
    return False

# -----------------------------------------------------------------------------

    # Exercice 24

def nchiffres(n) : 
    n = abs(n)

    n_str = str(n)

    diff_chiffres = []

    for chiffre in n_str :
        if chiffre not in diff_chiffres :
            diff_chiffres.append(chiffre)
    return len(diff_chiffres)

# -----------------------------------------------------------------------------


if __name__ == "__main__":
    # Example 1
    # l = [5, 8, 9, 47, 36, 123, 5, 3, 1]
    # somme(l) # retournera 237.
    
    # ------------------------------------------

    # Example 2 
    # print(pair(3)) # retournera 0
    # print(pair(4)) # retournera 1
    
    # ------------------------------------------

    # Example 3 
    # print(maximum(2, 5, 4)) # retournera 5

    # ------------------------------------------

    # Example 4
    # serie = [5, 8, 2, 1, 9, 3, 6, 7]
    # print(indexMax(serie)) # retournera 4

    # ------------------------------------------

    # Example 5
    # print(nomMois(4)) # retournera "Avril"

    # ------------------------------------------

    # Example 6
    # print(inverse("hello"))

    # ------------------------------------------

    # Example 7
    # print(compteMots('bonjour à tous, je suis étudiant.'))

    # ------------------------------------------

    # Example 8
    # print(occurrence("une belle vache", "e")) # retournera 4

    # ------------------------------------------

    # Example 9 
    # print(str2list("hello !")) # retournera ["h","e","l","l","o"," ","!"].

    # ------------------------------------------

    # Example 10 
    # matrix = [[15, 23, 45],
    #           [39, 63, 78],
    #           [56, 45, 12]]
    # print(find_num(matrix, 45)) # retournera (0, 2)
    # print(find_num(matrix, 17)) # retournera None
    
    # ------------------------------------------

    # Example 11
    # l = ['crotale', 'python', 'boa', 'couleuvre', 'cobra']
    # print(grands_mots(l, 5)) # retournera ['crotale', 'python', 'couleuvre']
    # print(grands_mots(l, 9)) # retournera None.

    # ------------------------------------------

    # Example 12
    # serie = [4, 52, 13, 9, 16, 49, 756, 7]
    # print(liste_paire(serie)) # retournera [2, 104, 6, 18, 8, 98, 378, 14]

    # ------------------------------------------

    # Example 13 
    # ptit_dej = ['biscottes', 'chocolat', 'cafe', 'tartines', 'the']
    # print(occ_liste(ptit_dej, 'c')) # retournera [1, 2, 1, 0, 0]

    # ------------------------------------------

    # Example 14 
    # nbre = 452475
    # print(stat_chiffres(nbre)) # retournera {4: 2, 5: 2, 2: 1, 7: 1}
    # nbre = 11122544456666
    # print(stat_chiffres(nbre)) # retournera {1: 3, 2: 2, 5: 2, 4: 3, 6: 4}
    
    # ------------------------------------------
    
    # Example 15
    
    # print(fibonacci(9)) # retournera [0, 1, 1, 2, 3, 5, 8, 13, 21]

    # ------------------------------------------

    # Example 16

    # s1 = [4, 5, 8, 89, 2, 14]
    # s2 = [2, 3, 8, 65, 45, 6]
    # print(diff_list(s1, s2)) # retournera [2, 2, 0, 24, -43, 8]
    
    # ------------------------------------------

    # Example 17 

    # xa, ya = 1, 2
    # xb, yb = 4, 6
    # print(distance(xa,ya,xb,yb))
    
    # ------------------------------------------

    # Example 19

    # print(premier(10)) # retournera False
    # print(premier(7)) # retournera True

    # ------------------------------------------

    # Example 20
    # print(npremier(7)) # retournera 17

    # ------------------------------------------

    # Example 21
    # print(swap(1, 2))

    # ------------------------------------------

    # Example 22 
    # t = [12, 65, 23, 14, 85, 11, 8, 41, 9, 0, 55, 3]
    # print(checkindex(t, 3))

    # ------------------------------------------

    # Example 23 
    # t = [12, 65, 23, 14, 85, 11, 8, 41, 9, 0, 55, 3]
    # print(check0to10(t, 11)) # retournera True
    # print(check0to10(t, 3)) # retournera False

    # ------------------------------------------

    # Example 24
    print(nchiffres(45)) # retournera 2
    print(nchiffres(6457392)) # retournera 7
    print(nchiffres(4555463))# retournera 4
    ...
    