import pandas as pd


# Read the csv file

df = pd.read_csv('output.csv')



def contains_review(name_phone):
    
    
    return 'review' in name_phone.lower() or 'watch' in name_phone.lower()


# Remove the rows that contain the word 'review' in the 'name_phone' column
df = df[~df['name'].apply(contains_review)]

def get_company(name_phone):
    if 'samsung' in name_phone.lower():
        return '1'
    elif 'xiaomi' in name_phone.lower():
        return '3'
    elif 'apple' in name_phone.lower():
        return '2'
    elif 'tecno' in name_phone.lower():
        return '4'
    elif 'infinix' in name_phone.lower():
        return '5'
    elif 'vivo' in name_phone.lower():
        return '6'
    elif 'realme' in name_phone.lower():
        return '7'
    elif 'oppo' in name_phone.lower():
        return '8'
    elif 'nokia' in name_phone.lower():
        return '9'
    elif 'onePlus' in name_phone.lower():
        return '10'
    elif 'huawei' in name_phone.lower():
        return '10'
    else:
        return '1'
    
df['company_id'] = df['name'].apply(get_company)



df.fillna('not_found', inplace=True)


# Save the filtered data to a new csv file
df.to_csv('mobo_1.csv', index=True)