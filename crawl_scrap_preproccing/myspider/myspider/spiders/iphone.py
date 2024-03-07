from bs4 import BeautifulSoup
import scrapy


class MySpider(scrapy.Spider):
    name = 'iphone'
    start_urls = [
        'https://www.gsmarena.com/apple-phones-48.php',
        'https://www.gsmarena.com/apple-phones-f-48-0-p2.php',
        'https://www.gsmarena.com/apple-phones-f-48-0-p3.php',
        # Add more start URLs as needed
    ]

    def parse(self, response):
        for url in response.css('a[href*="apple_iphone"]::attr(href)').getall():
            yield {'url': url}

        for url in response.xpath('//a[contains(@href, "apple_iphone")]/@href').getall():
            
            yield {'url': url}
        