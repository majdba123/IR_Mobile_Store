import pandas as pd


# Read the CSV file into a pandas DataFrame

df = pd.read_csv('links_of_website.csv')

print(df.columns)
# Open the text file for writing

with open('mobolist_phones.txt', 'w', encoding="utf-8") as f:
    

    # Loop through each row in the DataFrame
    for i, row in df.iterrows():

        # Extract the values of the desired columns

        summary_data = row['summery_datial']

        specs_data = row['specsic_datial']

        additional_data = row['additalona_spec']
        
        price = row['price']


        # Write the extracted values to the text file with a separator between each record

        f.write(f"{summary_data}\n")

        f.write(f"{specs_data}\n")

        f.write(f" {additional_data}\n")
        
        f.write(f"{price}\n")

        f.write("____\n")