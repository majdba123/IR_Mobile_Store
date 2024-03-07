from bs4 import BeautifulSoup
import scrapy
class MySpider(scrapy.Spider):
    name = 'samsung'
    start_urls = [
        'https://www.gsmarena.com/samsung-phones-9.php',
        'https://www.gsmarena.com/samsung-phones-f-9-0-p2.php',
        'https://www.gsmarena.com/samsung-phones-f-9-0-p3.php',
        'https://www.gsmarena.com/samsung-phones-f-9-0-p4.php',
        'https://www.gsmarena.com/samsung-phones-f-9-0-p5.php',
        # Add more start URLs as needed
    ]

    def parse(self, response):
        for href in response.css('a[href*="samsung_galaxy"]::attr(href)').getall():
            yield {'url': href}

        for href in response.xpath('//a[contains(@href, "samsung_galaxy")]/@href').getall():
            yield {'url': href}
    
