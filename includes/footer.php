    </main>
    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4"><?php echo SITE_NAME; ?></h3>
                    <p class="text-gray-300">All types of calculators and online tools in one place. Fast, accurate, and easy to use.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="<?php echo SITE_URL; ?>" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/pages/about.php" class="text-gray-300 hover:text-white transition">About Us</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/pages/contact.php" class="text-gray-300 hover:text-white transition">Contact Us</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/pages/privacy.php" class="text-gray-300 hover:text-white transition">Privacy Policy</a></li>
                        <li><a href="<?php echo SITE_URL; ?>/pages/disclaimer.php" class="text-gray-300 hover:text-white transition">Disclaimer</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact Info</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li><i class="fas fa-envelope mr-2"></i>Email: <a href="mailto:<?php echo SITE_EMAIL; ?>" class="hover:text-white"><?php echo SITE_EMAIL; ?></a></li>
                        <li><i class="fas fa-phone mr-2"></i>Helpline: <a href="tel:<?php echo SITE_PHONE; ?>" class="hover:text-white"><?php echo SITE_PHONE; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-300">
                <p>&copy; 2025 <?php echo SITE_NAME; ?>. All rights reserved.</p>
                <p class="mt-2">Developed by <a href="<?php echo DEVELOPER_URL; ?>" target="_blank" rel="noopener" class="text-blue-400 hover:text-blue-300"><?php echo DEVELOPER_NAME; ?></a></p>
            </div>
        </div>
    </footer>
    
    <script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
</body>
</html>
