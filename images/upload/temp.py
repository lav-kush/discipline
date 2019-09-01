import sys
import os
from selenium import webdriver
import time

# f = open("temp.txt", "w+")
# f.write("done!")
print('content got!')
# f.close()
exit()

argList = sys.argv
print("file name : "+argList[1])
print(type(argList[1]))

from selenium import webdriver
from selenium.webdriver.chrome.options import Options
chrome_options = Options()
chrome_options.add_argument("--headless")
chrome_options.add_argument('--no-sandbox')
driver = webdriver.Chrome('/usr/lib/chromium-browser/chromedriver', options=chrome_options)
print('connecting to url')
driver.get('https://www.onlineocr.net/')
print('connection done!')
driver.find_element_by_id("fileupload").send_keys(str(argList[1]))
print('file uploaded!')
time.sleep(5);
driver.find_element_by_id("MainContent_btnOCRConvert").click()
print('file processed!')
time.sleep(20);

f = open("temp.txt", "w+")
file_content = driver.find_element_by_id("MainContent_txtOCRResultText").get_attribute("value")
f.write(file_content)
print('content got!')
f.close()
print(os.system("cat temp.txt"))
os.system("python3 email_attachement.py "+ str(argList[1]) )
driver.close()
os.system("pkill chromium")
os.system("pkill chrome")

