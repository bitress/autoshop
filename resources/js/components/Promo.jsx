import React from 'react';

export default function Promo() {
  const scrollToContact = () => {
    document.getElementById('contact')?.scrollIntoView({ behavior: 'smooth' });
  };

  return (
    <section id="promo" className="promo-section">
      <div className="container">
        <div className="promo-card">

          {/* Left: copy */}
          <div>
            <p className="promo-eyebrow">// LIMITED OFFER — ACTIVE NOW</p>
            <h2 className="promo-headline">
              Free<br />
              <span>Demon Eyes</span>
            </h2>
            <p className="promo-desc">
              Get complimentary Demon Eyes with any Headlight Retrofit package.
              Choose your glow: Purple, Amber, Blue, Ice Blue, or White.
              Zero extra charge. Just tell us your color.
            </p>
          </div>

          {/* Right: CTA */}
          <div style={{ display: 'flex', flexDirection: 'column', alignItems: 'center', gap: 20, textAlign: 'center' }}>
            <div style={{
              fontFamily: 'IBM Plex Mono, monospace',
              fontSize: '3.5rem',
              lineHeight: 1,
              filter: 'drop-shadow(0 0 16px rgba(124,58,237,0.6))',
            }}>
              👁️
            </div>
            <button className="btn-promo" onClick={scrollToContact}>
              Claim Offer
            </button>
          </div>

        </div>
      </div>
      <div className="scanline-divider" style={{ marginTop: 80 }} />
    </section>
  );
}
