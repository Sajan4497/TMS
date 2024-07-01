<?php
include('config.php');
//include('extra.php');
//include('admin-sidebar.php');
include('admin-header.php');

// Define the content
$content = "
Welcome to [Your Company Name]

Your premier destination for unforgettable travel experiences.

Our Story

[Your Company Name] began as a passion project between friends who shared a love for exploration and discovery. What started as a small venture has grown into a reputable tour management company, thanks to our unwavering commitment to quality and customer satisfaction.

Meet Our Team

At [Your Company Name], we're proud to have assembled a team of experienced professionals who are passionate about travel and dedicated to providing unparalleled service. From our expert tour guides to our diligent support staff, each member of our team plays a vital role in ensuring that every aspect of your journey exceeds expectations.

Our Services

Discover the world with confidence knowing that [Your Company Name] has meticulously planned every detail of your trip. Whether you're seeking an immersive cultural experience, an adrenaline-pumping adventure, or a relaxing getaway, we offer a diverse range of services tailored to meet your needs.

Guided Tours: Embark on unforgettable journeys led by knowledgeable guides who will bring destinations to life with captivating stories and insights.
Travel Planning: Let our team handle the logistics so you can focus on enjoying every moment of your trip. From transportation and accommodation to activities and dining, we've got you covered.
Transportation: Travel in comfort and style with our reliable transportation services, whether you're exploring a bustling city or venturing off the beaten path.
Accommodation: Stay in handpicked accommodations that offer comfort, convenience, and local charm, ensuring a restful retreat after a day of exploration.

Our Clients

At [Your Company Name], we're privileged to serve a diverse clientele that includes solo travelers, families, corporate groups, and more. Our personalized approach ensures that each client receives the attention and care they deserve, resulting in unforgettable travel experiences that exceed expectations.

Our Values

At the heart of [Your Company Name] are our core values, which guide everything we do:

Excellence: We strive for excellence in every aspect of our work, from the quality of our tours to the professionalism of our team.
Integrity: We conduct business with honesty, transparency, and integrity, earning the trust and respect of our clients and partners.
Sustainability: We are committed to responsible travel practices that minimize our environmental impact and support local communities.
Customer Satisfaction: We prioritize the needs and preferences of our clients, ensuring that every journey with us is enjoyable, memorable, and hassle-free.

Testimonials

But don't just take our word for it—here's what our clients have to say about their experiences with [Your Company Name]:

[Insert Testimonial 1]
[Insert Testimonial 2]
[Insert Testimonial 3]

Get in Touch

Ready to embark on your next adventure with [Your Company Name]? Contact us today to learn more about our services, book a tour, or request a personalized itinerary. We can't wait to help you create memories that will last a lifetime.

Follow Us

Stay connected with [Your Company Name] for travel inspiration, tips, and updates. Follow us on [Social Media Platforms] to join our community of fellow travelers.

Feel free to customize this template further to fit your specific needs.
";

// Escape special characters in the content to prevent SQL injection
$content = mysqli_real_escape_string($conn, $content);

// Insert the content into the database
$sql = "INSERT INTO about (content) VALUES ('$content')";

if (mysqli_query($conn, $sql)) {
    echo "Content inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>
