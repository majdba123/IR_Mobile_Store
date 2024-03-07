import json
import re

with open('all_product.json', 'r') as file:
    spicification = json.load(file)

with open('spicification_text2.txt', 'w', encoding='utf-8') as f:
    x = ['Xiaomi Redmi K60 Ultra','Apple iPhone 4 CDMA', 'Apple iPhone 3G',
         'Apple iPhone','Samsung Galaxy Tab Active LTE',
         'Samsung Galaxy Alpha (S801)', 'Samsung Galaxy J7 Duo', 'Samsung Galaxy S5 Sport','Samsung Galaxy Ace 4',
         'Xiaomi Black Shark 5 Pro', 'Samsung Galaxy Tab S2 8.0', 'Samsung Galaxy E5']

    for product_spicification in spicification:
        for product in x:
            if product_spicification['name'] == product:
                product_spicification['spicification'] = product_spicification['spicification']
                cleaned_text = re.sub(r'^Tests.*\n(?:\n|.*\n)*', '', product_spicification['spicification'], flags=re.MULTILINE)
                f.write(cleaned_text)
                f.write('\n')
                f.write('____\n')
                break