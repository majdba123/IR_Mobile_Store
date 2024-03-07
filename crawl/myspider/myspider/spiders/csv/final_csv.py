        
import pandas as pd


# Specify the columns you want to import (excluding the first column)

columns_to_import = range(1, 28)


# Read the CSV file using the `usecols` parameter

df = pd.read_csv('mobo_1.csv', usecols=columns_to_import)
# Save the modified DataFrame to a new CSV fil
df.to_csv('MOBO_final.csv', index=False)