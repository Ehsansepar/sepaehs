#!/usr/bin/env python3
#-*- coding: utf-8 -*-
#
# $element.py
#
# $title
#
# Login : $element
#
# Nom: SEPAR		Prénom: Ehsan

from random import shuffle

symboles = ["As", "R", "D", "V", "10", "9", "8", "7", "6", "5", "4", "3", "2"]
valeures = [ 11,   10 , 10,  10,  10,   9,   8,   7,  6,   5,    4,  3 ,  2 ]
couleurs = ["♥", "♠", "♦", "♣"]

#------- Vos fonctions ici ---

def generateDeck() :
    deck = []
    compteur = 0
    # deck.append(carte)
    
    for i in range(len(symboles)) :
        for j in range(len(couleurs)) :
            # print(i,j, end=", ")
            carte = (symboles[i] ,valeures[i] ,couleurs[j])
            # carte = (symboles[i] ,valeures[j] ,couleurs[0:4])
            deck.append(carte)
            shuffle(deck)
    return deck


def getCard(deck, player) :
    carte = deck.pop()
    player.append(carte)




def sumHandPlayer(player) : 
    resultat = []
    for i in range(len(player)) :
        resultat.append(player[i][1])
    return sum(resultat)


def playerView(player) :
    for i in range(len(player)) : 
        print(f"{player[i][0]}{player[i][2]} => {player[i][1]}\n")
    print(f"Total = {sumHandPlayer(player)}\n")

def showWinner(player1, player2) : 
    resultat1 = sumHandPlayer(player1)
    resultat2 = sumHandPlayer(player2)

    if resultat1 < resultat2 : 
        print("le Joueur 1 a gagné")
    elif resultat1 == resultat2 : 
        print("match null")
    else :
        print("le Joueur 2 a gagné") 

    # print(resultat1 - resultat2)

#-----------------------------

pioche = generateDeck()
joueur1 = []
for i in range(7) :
    getCard(pioche, joueur1)
playerView(joueur1)

joueur2 = []
for i in range(7) :
    getCard(pioche, joueur2)

playerView(joueur2)

showWinner(joueur1, joueur2)




