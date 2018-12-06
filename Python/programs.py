#	Pairs of values with a given sum in a sorted array ##
lst = [-1, 1, 2,4,5, 7, 8]
sum = 6
first = 0
last = len(lst) - 1
print(lst)
out = []
while (first < last):
	if( lst[first] + lst[last] > sum ):
		last -= 1
	elif(lst[first] + lst[last] <  sum):
		first += 1
	elif(lst[first] + lst[last] ==  sum):
		out.append([lst[first],lst[last]])
		last -= 1
		first += 1
	else:
	   break

print("Pairs of values with sum = ",sum,out)
#	Pairs of values with a given sum in a sorted array ##
