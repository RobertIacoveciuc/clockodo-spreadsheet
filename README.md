#### Create a Comprehensive Spreadsheet for the Current Month Using the Clockodo API

Welcome to my codebase! 
Here, you can easily generate a detailed spreadsheet tailored to your needs with the help of the Clockodo API. 
Feel free to customize the code as per your requirements.

### How it works

Inside the public/excel directory, you'll find a default layout for the Excel sheet, 
named according to the format: MONTH_YEAR_FIRSTNAME_LASTNAME.xlsx.

Simply adjust the rows you wish to modify in the WriteToSpreadsheetService.php file.

We've provided some default code to guide you through the process.

### Installation

#### 1. Composer

    composer install
    
#### 2. Start Project

    symfony server:start

#### 3. Get your Clockodo Api key

#### 4. Update .env files with your date

    CLOCKODO_EMAIL=email.email@yahoo.com
    CLOCKODO_API_KEY=apikey

#### 5. Go to
    http://127.0.0.1:8000/generate

#### 6. Check out the public/excel directory


### Nice to have features

Generate Excel Sheets for given Month (Check TODO)
Have Multiple Excels inside public/excel
Generate automatically via Cron at the end of the Month


     

