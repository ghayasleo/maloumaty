# Custom Code Integration Guide – Houzez Theme

> ⚠️ **Note:** All modifications are being made in the **parent theme**. These changes will be lost when the theme is updated. Save this file and the linked code files for reapplying after updates.

---

## header.php

- File To Replace: [header.php](https://www.maloumaty.com/wp-admin/theme-editor.php?file=header.php&theme=houzez)

- File To Overwrite: [header.php](/header.php)

## footer.php

- File To Replace: [footer.php](https://www.maloumaty.com/wp-admin/theme-editor.php?file=footer.php&theme=houzez)

- File To Overwrite: [footer.php](/footer.php)

## logged-in-nav.php

- File To Replace: [logged-in-nav.php](https://www.maloumaty.com/wp-admin/theme-editor.php?file=template-parts%2Fheader%2Fpartials%2Flogged-in-nav.php&theme=houzez)

- File To Overwrite: [logged-in-nav.php](/logged-in-nav.php)

## framework/functions/property_functions.php

- File To Update: [property_functions.php](https://www.maloumaty.com/wp-admin/theme-editor.php?file=framework%2Ffunctions%2Fproperty_functions.php&theme=houzez)

- Look for the below code

  ```php
  $output .= '<a target="_blank" href="https://api.whatsapp.com/send?phone='.esc_attr( $args[ 'agent_whatsapp_call' ] ).'&text='.houzez_option('spl_con_interested', "Hello, I am interested in").' ['.get_the_title().'] '.get_permalink().'">';
  ```

- Replace the below code with the message you want to write

  ```php
  '.houzez_option('spl_con_interested', "Hello, I am interested in").' ['.get_the_title().'] '.get_permalink().'
  ```

  Note that `get_the_title()` dynamically fetches the name of property and `get_permalink()` dynamically fetches the link of the property page opened. It's better to ask ChatGPT what you want to write in the message and ask it to generate php code for you.
