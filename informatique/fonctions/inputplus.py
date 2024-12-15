def input_int(message) :

    while True : 
        messages = int(input(message))
        
        for i in range(len(messages)) :
            if messag

    return messages

nombre = input_int("Entrez un nombre : ")
print(f"{nombre = }, {type(nombre) = }")