def nchiffres(n) : 
    n = abs(n)

    n_str = str(n)

    new_lst = []

    for chiffre in n_str :
        if chiffre not in new_lst :
            new_lst.append(chiffre)
    return len(new_lst)

print(nchiffres(45)) # retournera 2
print(nchiffres(6457392)) # retournera 7
print(nchiffres(4555463))# retournera 4