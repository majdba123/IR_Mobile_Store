from bs4 import BeautifulSoup
import scrapy


class MySpider(scrapy.Spider):
    name = 'xiaomi'
    start_urls = [
        'https://www.gsmarena.com/xiaomi-phones-80.php',
        'https://www.gsmarena.com/xiaomi-phones-f-80-0-p2.php',
        'https://www.gsmarena.com/xiaomi-phones-f-80-0-p3.php',
        'https://www.gsmarena.com/xiaomi-phones-f-80-0-p4.php',
        # Add more start URLs as needed
    ]

    def parse(self, response):
        for href in response.css('a[href*="xiaomi_"]::attr(href)').getall():
            yield {'url': href}

        for href in response.xpath('//a[contains(@href, "xiaomi_")]/@href').getall():
            yield {'url': href}