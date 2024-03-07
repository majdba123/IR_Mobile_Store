import csv

not_found_threshold = 3  # change this to the number of "not_found" values you want to allow

with open('filtered_file.csv', 'r', encoding='utf-8') as csvfile:
    reader = csv.reader(csvfile)
    header = next(reader)

    # filter the rows based on the condition
    filtered_rows = (row for row in reader if sum(1 for col in row if col == 'not_found') > not_found_threshold)

    # write the filtered rows to a new file
    with open('un_aqurency.csv', 'w', newline='', encoding='utf-8') as output_file:
        writer = csv.writer(output_file)
        writer.writerow(header)
        writer.writerows(filtered_rows)