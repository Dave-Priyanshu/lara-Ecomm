<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lara Ecomm</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'trade-green': '#16a34a',
                        'trade-red': '#dc2626',
                        'trade-blue': '#2563eb',
                        'trade-orange': '#ea580c',
                        'trade-gray': '#1f2937',
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .btn-primary {
                @apply bg-trade-orange text-white px-6 py-3 rounded-lg hover:bg-orange-700 font-medium transition-colors;
            }
            
            .btn-secondary {
                @apply bg-trade-green text-white px-6 py-3 rounded-lg hover:bg-green-700 font-medium transition-colors;
            }
            
            .card {
                @apply bg-white rounded-lg shadow p-6 border border-gray-100;
            }
            
            .price-up {
                @apply text-trade-green font-medium;
            }
            
            .price-down {
                @apply text-trade-red font-medium;
            }
            
            .nav-link {
                @apply px-4 py-2 hover:text-trade-orange transition-colors;
            }
            
            .nav-link.active {
                @apply text-trade-orange border-b-2 border-trade-orange;
            }
            
            .product-card {
                @apply bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow;
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-leaf text-trade-orange text-2xl"></i>
                <span class="text-xl font-bold text-trade-gray">Lara Ecomm</span>
            </div>
            <div class="hidden md:flex space-x-1">
                <a href="{{ route('home') }}" class="nav-link active">Home</a>
                <a href="#products" class="nav-link">Products</a>
                <a href="#pricing" class="nav-link">Pricing</a>
                <a href="#about" class="nav-link">About Us</a>
                <a href="{{ route('contactPage') }}" class="nav-link">Contact</a>
                <a href="{{ route('cartPage') }}" class="nav-link">Cart</a>
            </div>
            <div class="flex items-center space-x-4">
                @guest
                    <button class="btn-primary"><a href="{{ route('register') }}">Login/Register</a></button>    
                @endguest

                @auth
                    @if (Auth::user()->role === 'vendor')
                        <button class="btn-primary"><a href="{{ route('dashboard') }}">Dashboard</a></button>    
                    @else
                        <button class="btn-primary"><a href="{{ route('vendor.otp-form') }}">Become Vendor</a></button>
                    @endif
                @endauth
                <button class="md:hidden">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="bg-gradient-to-r from-trade-orange to-trade-green text-white py-20">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Premium Rwandan Mangoes for Canadian Markets</h1>
                <p class="text-xl mb-8">Direct farm-to-table supply chain ensuring the freshest, highest quality mangoes from Rwanda to Canada</p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <button class="btn-primary">Order Now</button>
                    <button class="btn-secondary">Learn More</button>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="https://images.unsplash.com/photo-1550258987-190a2d41a8ba" alt="Fresh Rwandan Mangoes" class="rounded-lg shadow-2xl max-h-96 object-cover">
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="card">
                    <div class="text-4xl font-bold text-trade-orange mb-2">10+</div>
                    <div class="text-gray-600">Years in Business</div>
                </div>
                <div class="card">
                    <div class="text-4xl font-bold text-trade-orange mb-2">200+</div>
                    <div class="text-gray-600">Rwandan Farmers</div>
                </div>
                <div class="card">
                    <div class="text-4xl font-bold text-trade-orange mb-2">50+</div>
                    <div class="text-gray-600">Canadian Clients</div>
                </div>
                <div class="card">
                    <div class="text-4xl font-bold text-trade-orange mb-2">100%</div>
                    <div class="text-gray-600">Organic Certified</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-trade-gray">Our Premium Mango Varieties</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product 1 -->
                <div class="product-card">
                    <img src="https://images.unsplash.com/photo-1605027990121-cf7368f0d6f8" alt="Kent Mango" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Kent Mango</h3>
                        <p class="text-gray-600 mb-4">Sweet with rich flavor, minimal fiber, perfect for fresh consumption and processing.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-trade-orange">$2.50/kg</span>
                            <button class="btn-primary px-4 py-2 text-sm">Inquire</button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="product-card">
                    <img src="https://images.unsplash.com/photo-1553272725-086100a252f3" alt="Tommy Atkins Mango" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Tommy Atkins</h3>
                        <p class="text-gray-600 mb-4">Vibrant color, firm flesh, excellent shelf life for international shipping.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-trade-orange">$2.20/kg</span>
                            <button class="btn-primary px-4 py-2 text-sm">Inquire</button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="product-card">
                    <img src="https://images.unsplash.com/photo-1601493700631-2b16ec4b4716" alt="Keitt Mango" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Keitt Mango</h3>
                        <p class="text-gray-600 mb-4">Late season variety with sweet-tart flavor and minimal fiber.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-trade-orange">$2.80/kg</span>
                            <button class="btn-primary px-4 py-2 text-sm">Inquire</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-trade-gray">Current Market Prices</h2>
            
            <div class="card max-w-4xl mx-auto">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mango Variety</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quality Grade</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price (USD/kg)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Availability</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-medium">Kent</td>
                                <td class="px-6 py-4 whitespace-nowrap">Premium (Export)</td>
                                <td class="px-6 py-4 whitespace-nowrap price-up">$2.50</td>
                                <td class="px-6 py-4 whitespace-nowrap">Oct-Dec</td>
                                <td class="px-6 py-4 whitespace-nowrap"><button class="btn-primary px-3 py-1 text-sm">Order</button></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-medium">Tommy Atkins</td>
                                <td class="px-6 py-4 whitespace-nowrap">Premium (Export)</td>
                                <td class="px-6 py-4 whitespace-nowrap">$2.20</td>
                                <td class="px-6 py-4 whitespace-nowrap">Oct-Jan</td>
                                <td class="px-6 py-4 whitespace-nowrap"><button class="btn-primary px-3 py-1 text-sm">Order</button></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-medium">Keitt</td>
                                <td class="px-6 py-4 whitespace-nowrap">Premium (Export)</td>
                                <td class="px-6 py-4 whitespace-nowrap price-up">$2.80</td>
                                <td class="px-6 py-4 whitespace-nowrap">Jan-Mar</td>
                                <td class="px-6 py-4 whitespace-nowrap"><button class="btn-primary px-3 py-1 text-sm">Order</button></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-medium">Kent</td>
                                <td class="px-6 py-4 whitespace-nowrap">Standard</td>
                                <td class="px-6 py-4 whitespace-nowrap">$1.80</td>
                                <td class="px-6 py-4 whitespace-nowrap">Oct-Dec</td>
                                <td class="px-6 py-4 whitespace-nowrap"><button class="btn-primary px-3 py-1 text-sm">Order</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                    <h4 class="font-bold mb-2">Shipping Information</h4>
                    <p class="text-sm text-gray-600">Shipping costs vary based on quantity and destination in Canada. Typical shipping time is 7-10 days by air freight. Minimum order quantity: 500kg. Contact us for exact shipping quotes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section id="process" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-trade-gray">Our Farm-to-Table Process</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card text-center">
                    <div class="bg-trade-orange text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-seedling text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">1. Sustainable Farming</h3>
                    <p class="text-gray-600">We partner with 200+ smallholder farmers in Rwanda using organic practices and fair trade principles.</p>
                </div>
                
                <div class="card text-center">
                    <div class="bg-trade-orange text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-check-circle text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">2. Rigorous Quality Control</h3>
                    <p class="text-gray-600">Each mango is hand-selected, washed, and inspected to meet Canadian import standards.</p>
                </div>
                
                <div class="card text-center">
                    <div class="bg-trade-orange text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-plane text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">3. Efficient Export</h3>
                    <p class="text-gray-600">Temperature-controlled air freight ensures freshness upon arrival in Canadian markets.</p>
                </div>
            </div>
            
            <div class="mt-12 card">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae" alt="Mango packaging" class="rounded-lg w-full">
                    </div>
                    <div class="md:w-1/2 md:pl-8">
                        <h3 class="text-2xl font-bold mb-4">Certifications & Compliance</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check text-trade-green mt-1 mr-2"></i>
                                <span>Canada Organic Regime (COR) Certified</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-trade-green mt-1 mr-2"></i>
                                <span>Fair Trade Certified</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-trade-green mt-1 mr-2"></i>
                                <span>GlobalG.A.P. Certified</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-trade-green mt-1 mr-2"></i>
                                <span>CFIA Approved</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-trade-green mt-1 mr-2"></i>
                                <span>HACCP Certified Processing</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                    <h2 class="text-3xl font-bold mb-6 text-trade-gray">About AfriFresh Exports</h2>
                    <p class="text-gray-600 mb-4">Founded in 2012, AfriFresh Exports specializes in connecting Rwandan mango farmers with Canadian importers, retailers, and food service providers.</p>
                    <p class="text-gray-600 mb-4">Our mission is to create sustainable economic opportunities for Rwandan farmers while delivering the highest quality tropical fruits to Canadian consumers.</p>
                    <p class="text-gray-600">We handle every step of the supply chain from farm management to final delivery, ensuring quality, transparency, and fair compensation at every stage.</p>
                </div>
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1605007493699-af65834f8aa3" alt="Rwandan farmers" class="rounded-lg shadow-lg w-full">
                </div>
            </div>
            
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="card">
                    <h3 class="text-xl font-bold mb-4">Our Impact in Rwanda</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-users text-trade-orange mt-1 mr-2"></i>
                            <span>200+ smallholder farmers in our network</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-home text-trade-orange mt-1 mr-2"></i>
                            <span>15 rural communities supported</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-graduation-cap text-trade-orange mt-1 mr-2"></i>
                            <span>Annual training programs on sustainable farming</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-child text-trade-orange mt-1 mr-2"></i>
                            <span>School support programs for farmers' children</span>
                        </li>
                    </ul>
                </div>
                
                <div class="card">
                    <h3 class="text-xl font-bold mb-4">Our Canadian Partners</h3>
                    <p class="text-gray-600 mb-4">We supply mangoes to:</p>
                    <div class="flex flex-wrap gap-4">
                        <div class="bg-gray-100 px-4 py-2 rounded">Major grocery chains</div>
                        <div class="bg-gray-100 px-4 py-2 rounded">Specialty food stores</div>
                        <div class="bg-gray-100 px-4 py-2 rounded">Restaurant groups</div>
                        <div class="bg-gray-100 px-4 py-2 rounded">Food processors</div>
                        <div class="bg-gray-100 px-4 py-2 rounded">Distributors</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-trade-orange text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">What Our Partners Say</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card bg-white bg-opacity-10 backdrop-filter backdrop-blur-sm">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-300 text-2xl">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="italic mb-4">"The quality of AfriFresh mangoes consistently exceeds our expectations. Their reliable supply chain allows us to feature Rwandan mangoes year-round."</p>
                    <div class="font-bold">- Canadian Grocery Chain</div>
                </div>
                
                <div class="card bg-white bg-opacity-10 backdrop-filter backdrop-blur-sm">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-300 text-2xl">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="italic mb-4">"Working with AfriFresh has transformed our community. We now earn fair prices for our harvest and have improved our farming techniques."</p>
                    <div class="font-bold">- Rwandan Farmer Cooperative</div>
                </div>
                
                <div class="card bg-white bg-opacity-10 backdrop-filter backdrop-blur-sm">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-300 text-2xl">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <p class="italic mb-4">"The flavor profile of these mangoes is exceptional. Our customers specifically ask for the Rwandan varieties we source through AfriFresh."</p>
                    <div class="font-bold">- Specialty Food Retailer</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-trade-gray">Contact Us</h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="card">
                    <h3 class="text-xl font-bold mb-6">Get in Touch</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-gray-700 mb-1">Your Name</label>
                            <input type="text" class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-trade-orange focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-1">Email Address</label>
                            <input type="email" class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-trade-orange focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-trade-orange focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-1">Your Message</label>
                            <textarea rows="4" class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-trade-orange focus:border-transparent"></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full">Send Message</button>
                    </form>
                </div>
                
                <div>
                    <div class="card mb-6">
                        <h3 class="text-xl font-bold mb-4">Our Offices</h3>
                        <div class="space-y-4">
                            <div>
                                <h4 class="font-bold text-trade-orange">Rwanda Headquarters</h4>
                                <p class="text-gray-600">KG 123 St, Kigali, Rwanda</p>
                                <p class="text-gray-600">+250 123 456 789</p>
                            </div>
                            <div>
                                <h4 class="font-bold text-trade-orange">Canada Distribution</h4>
                                <p class="text-gray-600">123 Commerce St, Toronto, ON</p>
                                <p class="text-gray-600">+1 416 123 4567</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <h3 class="text-xl font-bold mb-4">Business Hours</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Monday-Friday</span>
                                <span class="font-medium">8:00 AM - 5:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Saturday</span>
                                <span class="font-medium">9:00 AM - 1:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Sunday</span>
                                <span class="font-medium">Closed</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex space-x-4">
                        <a href="#" class="bg-blue-600 text-white p-3 rounded-full">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="bg-blue-400 text-white p-3 rounded-full">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="bg-red-600 text-white p-3 rounded-full">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="bg-blue-800 text-white p-3 rounded-full">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl text-center">
            <h3 class="text-2xl font-bold mb-4">Subscribe to Our Market Updates</h3>
            <p class="text-gray-600 mb-6">Get the latest pricing, availability, and industry news delivered to your inbox.</p>
            <div class="flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                <input type="email" placeholder="Your email address" class="flex-grow border px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-trade-orange">
                <button class="btn-primary px-6">Subscribe</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-trade-gray text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-leaf text-trade-orange text-2xl"></i>
                        <span class="text-xl font-bold">AfriFresh Exports</span>
                    </div>
                    <p class="text-gray-300">Bridging Rwandan farmers with Canadian markets through sustainable, fair trade practices.</p>
                </div>
                
                <div>
                    <h4 class="font-bold text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Products</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Pricing</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Our Process</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold text-lg mb-4">Legal</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Terms of Service</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Import Compliance</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Certifications</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold text-lg mb-4">Contact Info</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2 text-trade-orange"></i>
                            <span class="text-gray-300">KG 123 St, Kigali, Rwanda</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt mt-1 mr-2 text-trade-orange"></i>
                            <span class="text-gray-300">+250 796132866</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-2 text-trade-orange"></i>
                            <span class="text-gray-300">info@afrifreshexports.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2023 AfriFresh Exports. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>