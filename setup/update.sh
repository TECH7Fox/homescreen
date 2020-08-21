#get version
#check for new versions

echo install system requirements
sed 's/#.*//' requirementsSystem.txt | xargs sudo apt-get install

echo install python requirements
pip install --requirement requirementsPython.txt
