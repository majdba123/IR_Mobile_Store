import requests
from bs4 import BeautifulSoup
import time
import os
import re
import json

with open('test_product.json', 'r') as file:
        spicification=json.load(file)
        
        
with open('spicification_text.txt', 'w', encoding='utf-8') as f:
    for product_spicification in spicification:
        product_spicification['spicification'] = product_spicification['spicification']
        cleaned_text = re.sub(r'^Tests.*\n(?:\n|.*\n)*', '', product_spicification['spicification'], flags=re.MULTILINE)
        f.write(cleaned_text)
        f.write('\n')  
        f.write('__________________________\n')
      
          # Add an empty line after each spicification
        

    

        