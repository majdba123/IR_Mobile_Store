import requests
from bs4 import BeautifulSoup
import time
import os
import json
from faker import Faker
from fake_useragent import UserAgent
import random
def main():
    ua = UserAgent()
    def extract_product_details(product_url):
        headers = {'User-Agent': ua.random}
        session = requests.Session()
        response=session.get(product_url,headers=headers)
        if response.status_code == 200:
            try:
                 soup=BeautifulSoup(response.text, 'html.parser')
            except:
                time.sleep(random.uniform(3, 5))
                return extract_product_details(product_url)
            if soup:
                try: 
                    spicification = soup.find('div', id='specs-list').text.strip()
                except:
                    spicification="no_spitification"
                try:
                    images = soup.select('img')
                    image = images[1]['src']
                except:
                    image="no image"
                url=product_url
                try: 
                    h1 = soup.select_one('h1').text.strip()
                except:
                        h1="no name"
                my_array = {'spicification': spicification, 'image': image, 'url': url, 'name':h1}

                return my_array
            else:

                return "no soup"

        elif response.status_code == 429:

            time.sleep(random.uniform(3, 5))

            return extract_product_details(product_url)

        else:

            return "can not retervil"

    base_url='https://www.gsmarena.com/'
    with open('url_of_all_product.json', 'r') as file:
        product_urls=json.load(file)

        
    product_details_list = []
    i=0

    for product_url in product_urls:
        x=base_url+product_url['url']
        product_details = extract_product_details(x)
        product_details_list.append(product_details)
        output_json = json.dumps(product_details_list)
        with open('phones4.json', 'w') as output_file:
            output_file.write(output_json)
        time.sleep(random.uniform(1, 2))
        i=i+1  
        print( i )
        print('_______________________')
        if(i==1000):
            break
    

    
        
   

if __name__ == "__main__":
    main()