with open("Plug.csv") as y:
    plugs = [i.strip().split(",")[1] for i in y.readlines()]

import random

all = ""
for plug in plugs:
    all += (plug + "," +str(random.randrange(50,100))) + "\n"

import clipboard
clipboard.copy(all)
exit()

with open("Plug.csv") as y:
    plugs = [i.strip().split(",")[0] for i in y.readlines()]

nums = [42 , 18 , 63 , 45 , 25 , 39 , 21 , 61 , 77 , 1]
d = {}
for i in range(len(nums)):
    d[i+1] = []
    for j in range(nums[i]):
        d[i+1].append(plugs.pop())

all = ""

for key,lst in d.items():
    for i in lst:
        line = i + "," + str(key)
        all += line + "\n"

import clipboard
clipboard.copy(all)
exit()

with open("Supports.csv") as y:
    lines = y.readlines()

x = [",".join(i.strip().split(",")[1:]) for i in lines]

with open("Plug.csv") as y:
    plugs = [i.strip().split(",")[1] for i in y.readlines()]

import random

all = ""
for plug in plugs:

    all += (plug + "," + random.choice(x)) + "\n"
import clipboard
clipboard.copy(all)
