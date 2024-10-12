from random import *


impair = 0 
pair = 0 
i = 0

while i <= 10 :
    de1 = randint(1, 10)
    de2 = randint(1, 10)

    somme_des_des = (de1 + de2)

    if somme_des_des % 2 == 0 :
        print(f"{(i + 1)}ème Fois {de1:2} +{de2:2} = {somme_des_des:2} Pair")
        pair += 1

    else :
        print(f"{(i + 1)}ème Fois {de1:2} + {de2:2} = {somme_des_des:2} Impair")
        impair += 1

    i += 1
print("Terminé !")
print(f"Pair {pair} fois \nImpair {impair} fois")
