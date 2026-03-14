import React from 'react';

export default function Footer() {
  return (
    <footer className="footer">
      <div className="container footer-inner">

        <span className="footer-copy">
          &copy; {new Date().getFullYear()} 1625 Auto Lab
        </span>

        <span className="footer-coords">
          15.0794° N, 120.6200° E — San Fernando, PH
        </span>

        <ul className="footer-links">
          <li>
            <a
              href="https://www.facebook.com/1625autolab"
              target="_blank"
              rel="noopener noreferrer"
            >
              Facebook
            </a>
          </li>
          <li>
            <a href="#contact" onClick={(e) => {
              e.preventDefault();
              document.getElementById('contact')?.scrollIntoView({ behavior: 'smooth' });
            }}>
              Book
            </a>
          </li>
        </ul>

        <span className="footer-byline">
          Architected by <a href="https://byteress.xyz" target="_blank" rel="noopener noreferrer">Bitressium</a>
        </span>

      </div>
    </footer>
  );
}
