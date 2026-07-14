# HBI Ventures Website

A static, multi-page website designed for deployment to Vercel and Network Solutions.

## Vercel
Upload the contents of this folder to the root of the GitHub repository. Vercel should automatically detect it as a static site because `index.html` is in the repository root. No framework preset is required.

## Network Solutions
Upload all files and folders to the public web directory. The PHP contact form requires Linux hosting with PHP mail enabled.

### Contact form
- Destination: `info@hbiventures.com`
- Sender: `website@hbiventures.com`
- Reply-To: visitor email

Before launch, create `website@hbiventures.com` or change the From address in `contact-handler.php` to an existing domain mailbox. Confirm SPF/DKIM settings with Network Solutions for reliable delivery.

## Important
Vercel does not run traditional PHP. The contact form can be visually tested on Vercel, but submission must be tested on Network Solutions Linux hosting.
