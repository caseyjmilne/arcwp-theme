<?php
/**
 * Template Name: Security Policy
 */
get_header();
?>

<main class="min-h-screen">
    <article>
        <div class="max-w-[1120px] mx-auto px-4 py-16 lg:py-20">
            <h1 class="text-4xl lg:text-5xl font-black text-gray-400 mb-8 leading-tight">
                Security Policy
            </h1>

            <div class="prose prose-lg max-w-none
                prose-headings:font-black prose-headings:text-gray-400
                prose-h2:text-3xl prose-h2:mt-12 prose-h2:mb-6
                prose-h3:text-2xl prose-h3:mt-10 prose-h3:mb-4
                prose-h4:text-xl prose-h4:mt-8 prose-h4:mb-3
                prose-p:text-gray-400 prose-p:leading-relaxed prose-p:mb-6
                prose-a:text-gray-400 prose-a:font-semibold hover:prose-a:opacity-70
                prose-strong:text-gray-400 prose-strong:font-bold
                prose-ul:mb-6 prose-li:text-gray-400">

                <p class="text-sm text-gray-500 mb-8">Last updated: <?php echo date('F j, Y'); ?></p>

                <h2>Our Commitment to Security</h2>
                <p>At ARC Software, security is fundamental to everything we build. We are committed to protecting the security and privacy of our users and their data through rigorous security practices and continuous monitoring.</p>

                <h2>Reporting Security Vulnerabilities</h2>
                <p>We take security vulnerabilities seriously and appreciate responsible disclosure from the security community.</p>

                <h3>How to Report</h3>
                <p>If you discover a security vulnerability in any of our products or services, please report it to us immediately:</p>
                <ul>
                    <li><strong>Email:</strong> <a href="mailto:security@arcwp.ca">security@arcwp.ca</a></li>
                    <li>Use PGP encryption when possible (key available upon request)</li>
                    <li>Include detailed steps to reproduce the vulnerability</li>
                    <li>Provide any relevant proof-of-concept code or screenshots</li>
                </ul>

                <h3>What to Expect</h3>
                <ul>
                    <li>We will acknowledge receipt of your report within 48 hours</li>
                    <li>We will provide an estimated timeline for addressing the issue</li>
                    <li>We will keep you informed of our progress</li>
                    <li>We will credit you in our security advisories (unless you prefer to remain anonymous)</li>
                </ul>

                <h3>Responsible Disclosure Guidelines</h3>
                <p>We ask that security researchers:</p>
                <ul>
                    <li>Provide us reasonable time to address the vulnerability before public disclosure</li>
                    <li>Avoid accessing, modifying, or deleting user data</li>
                    <li>Do not exploit the vulnerability for personal gain</li>
                    <li>Do not perform testing on production systems when possible</li>
                    <li>Make a good faith effort to avoid privacy violations and service disruptions</li>
                </ul>

                <h2>Security Practices</h2>

                <h3>Code Security</h3>
                <ul>
                    <li>Regular security audits of all products</li>
                    <li>Automated vulnerability scanning in our development pipeline</li>
                    <li>Code review requirements for all changes</li>
                    <li>Adherence to WordPress coding standards and security best practices</li>
                    <li>Regular dependency updates and security patches</li>
                </ul>

                <h3>Data Protection</h3>
                <ul>
                    <li>Encryption in transit using TLS 1.3</li>
                    <li>Encryption at rest for sensitive data</li>
                    <li>Strong password requirements and hashing</li>
                    <li>Regular security backups</li>
                    <li>Access controls and principle of least privilege</li>
                </ul>

                <h3>Infrastructure Security</h3>
                <ul>
                    <li>Hardened server configurations</li>
                    <li>Regular security updates and patches</li>
                    <li>Intrusion detection and prevention systems</li>
                    <li>DDoS protection and mitigation</li>
                    <li>24/7 security monitoring</li>
                    <li>Regular penetration testing</li>
                </ul>

                <h2>Product Security Features</h2>

                <h3>ARC Suite Security</h3>
                <p>Our products include built-in security features:</p>
                <ul>
                    <li>Input validation and sanitization</li>
                    <li>SQL injection prevention</li>
                    <li>Cross-site scripting (XSS) protection</li>
                    <li>Cross-site request forgery (CSRF) protection</li>
                    <li>Authentication and authorization controls</li>
                    <li>Secure session management</li>
                    <li>Rate limiting and brute force protection</li>
                </ul>

                <h3>WordPress Security</h3>
                <p>We follow WordPress security best practices:</p>
                <ul>
                    <li>Proper use of WordPress nonces</li>
                    <li>Sanitization of all user inputs</li>
                    <li>Escaping of all outputs</li>
                    <li>Capability checks for administrative functions</li>
                    <li>Prepared statements for database queries</li>
                    <li>Secure file upload handling</li>
                </ul>

                <h2>Security Updates</h2>
                <p>We release security updates promptly when vulnerabilities are discovered:</p>
                <ul>
                    <li><strong>Critical:</strong> Patches released within 24-48 hours</li>
                    <li><strong>High:</strong> Patches released within 7 days</li>
                    <li><strong>Medium:</strong> Patches released within 30 days</li>
                    <li><strong>Low:</strong> Included in regular update cycle</li>
                </ul>

                <h3>Notification Process</h3>
                <p>When security updates are released:</p>
                <ul>
                    <li>Customers receive email notifications</li>
                    <li>Security advisories are published on our website</li>
                    <li>Severity levels and CVE numbers are provided when applicable</li>
                    <li>Upgrade instructions are included</li>
                </ul>

                <h2>Third-Party Security</h2>
                <p>We carefully evaluate the security of third-party components:</p>
                <ul>
                    <li>Regular audits of dependencies</li>
                    <li>Monitoring for known vulnerabilities</li>
                    <li>Prompt updates when security issues are discovered</li>
                    <li>Use of only reputable and maintained libraries</li>
                </ul>

                <h2>User Account Security</h2>
                <p>We recommend users follow these security practices:</p>
                <ul>
                    <li>Use strong, unique passwords</li>
                    <li>Enable two-factor authentication (2FA) when available</li>
                    <li>Keep products updated to the latest version</li>
                    <li>Regularly review account activity</li>
                    <li>Limit user permissions appropriately</li>
                    <li>Use secure hosting environments</li>
                </ul>

                <h2>Compliance and Certifications</h2>
                <p>ARC Software maintains compliance with:</p>
                <ul>
                    <li>PIPEDA (Personal Information Protection and Electronic Documents Act)</li>
                    <li>GDPR (General Data Protection Regulation) for EU customers</li>
                    <li>WCAG 2.1 accessibility standards</li>
                    <li>Industry security best practices and frameworks</li>
                </ul>

                <h2>Incident Response</h2>
                <p>In the event of a security incident:</p>
                <ul>
                    <li>Our incident response team is activated immediately</li>
                    <li>Affected systems are isolated and secured</li>
                    <li>A thorough investigation is conducted</li>
                    <li>Affected users are notified according to legal requirements</li>
                    <li>Remediation measures are implemented</li>
                    <li>Post-incident analysis is performed to prevent recurrence</li>
                </ul>

                <h2>Security Training</h2>
                <p>Our team receives ongoing security training:</p>
                <ul>
                    <li>Secure coding practices</li>
                    <li>Common vulnerability patterns and prevention</li>
                    <li>Security testing methodologies</li>
                    <li>Incident response procedures</li>
                </ul>

                <h2>Security Resources</h2>
                <p>We provide security resources for our users:</p>
                <ul>
                    <li>Security documentation and guides</li>
                    <li>Best practices for secure implementation</li>
                    <li>Security checklist for deployments</li>
                    <li>Regular security blog posts and advisories</li>
                </ul>

                <h2>Bug Bounty Program</h2>
                <p>We are planning to launch a bug bounty program to reward security researchers who help us identify vulnerabilities. Stay tuned for details.</p>

                <h2>Contact Security Team</h2>
                <p>For security-related inquiries, please contact our security team:</p>
                <p>
                    <strong>ARC Software Security Team</strong><br>
                    Vancouver, British Columbia, Canada<br>
                    Email: <a href="mailto:security@arcwp.ca">security@arcwp.ca</a><br>
                    Website: <a href="https://arcwp.ca">arcwp.ca</a>
                </p>
                <p class="text-sm text-gray-500 mt-8">Please do not use this contact for general support inquiries. For non-security issues, visit our <a href="<?php echo esc_url(site_url('support')); ?>">support page</a>.</p>
            </div>
        </div>
    </article>
</main>

<?php
get_footer();
