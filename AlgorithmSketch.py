#Sketch of Critic-User Algorithm

class Person(object):
    def __init__(self, firstName, lastName, ID, action, horror, romance):
        self.firstName = firstName
        self.lastName = lastName
        self.fullName = firstName + ' ' + lastName
        self.ID = ID
        self.action = action
        self.horror = horror
        self.romance = romance

    
user1 = Person('Sammy', 'Geller', '1001', 8, 10, 1) #User
user2 = Person('Critic', 'Dude', '2001', 3, 2, 10) #Critic

def movieavg(user, critic):
    return (abs(user.action - critic.action) + abs(user.horror - critic.horror) + abs(user.romance - critic.romance))/3

def matchmake(user, critic):
    avg = movieavg(user, critic)
    if avg >= 9:
        print('Perfect Match')
    elif avg >= 5:
        print('Okay Match')
    else:
        print('Bad Match')

matchmake(user1, user2)