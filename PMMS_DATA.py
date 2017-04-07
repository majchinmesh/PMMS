import requests
import random

URL = "http://192.168.1.2/PMMS/form_help/new_student_insert"

FIDS = [11,1,10,5,8,6,2,3,7]

SDATA = """14CSE1010	CSE	Kuldeep Singh
14CSE1011	CSE	Madhusudan Meena
14CSE1012	CSE	Mangalorekar Kunal Gautam
14CSE1013	CSE	Chinmesh Manjrekar
14CSE1014	CSE	Md Fahim Ansari
14CSE1015	CSE	Nidhi Ranjan
14CSE1016	CSE	Nikhil Chaudhary
14CSE1017	CSE	Om Prakash Verma
14CSE1018	CSE	Palash Rajendra Soundarkar
14CSE1019	CSE	Pranav Vinod Machingal
14CSE1021	CSE	Reetwik Das
14CSE1022	CSE	Raj Rohit
14CSE1023	CSE	Shahil Ahmed C.G
14CSE1024	CSE	Sourab Mangrulkar
14CSE1025	CSE	Suhani Shrivastava
14CSE1026	CSE	Sunil Sri Datta Jammalamadaka
14CSE1027	CSE	Tamba Soham Girish
14CSE1028	CSE	Tangella Manvitha
14CSE1029	CSE	Vannati Sai Kumar
14CSE1030	CSE	Yallamelli Abhishek
14CSE1031	CSE	Kevin Monteiro
13CSE007	CSE	Arjit Punia"""
SDATA = SDATA.split('\n')
SDATA =  [ [x.split('\tCSE\t')[0] , x.split('\tCSE\t')[1]] for x in SDATA]

rdata = []

for s in SDATA :
    random.shuffle(FIDS)
    sup = FIDS[0]
    ex1 = FIDS[1]
    ex2 = FIDS[2]
    ex3 = FIDS[3]
    email = ''.join(s[1].split(' '))+'@gmail.com'
    roll = s[0]
    name = s[1]
    print(roll,name,email,sup,ex1,ex2,ex3)

    payload = {'name':name ,'roll': roll,'email':email ,'Supervisor': sup,'Exeminar_1':ex1 ,'Exeminar_2':ex2 , "Exeminar_3" :ex3}
    r = requests.post(URL, data=payload)
    s = r.text
    rdata.append(s.split('\n')[-1])
    

print(s)

