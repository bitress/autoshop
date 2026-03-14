import React from 'react';

function LensElement() {
  return (
    <div className="lens-wrap">
      <div className="lens">
        {/* Concentric spinning rings */}
        <div className="lens-ring lens-ring-1" />
        <div className="lens-ring lens-ring-2" />
        <div className="lens-ring lens-ring-3" />
        <div className="lens-ring lens-ring-4" />

        {/* Crosshair */}
        <div className="lens-cross" />

        {/* Tick marks */}
        <div className="lens-tick lens-tick-top"    />
        <div className="lens-tick lens-tick-right"  />
        <div className="lens-tick lens-tick-bottom" />
        <div className="lens-tick lens-tick-left"   />

        {/* Center glow dot */}
        <div className="lens-center" />

        {/* Label overlays */}
        <span className="lens-label lens-label-tl">01 / OPTICS</span>
        <span className="lens-label lens-label-tr">FOCUSED</span>
        <span className="lens-label lens-label-br">HQ: PAMPANGA</span>
      </div>
    </div>
  );
}

export default function Hero() {
  const scrollToContact = () => {
    document.getElementById('contact')?.scrollIntoView({ behavior: 'smooth' });
  };
  const scrollToServices = () => {
    document.getElementById('services')?.scrollIntoView({ behavior: 'smooth' });
  };

  return (
    <section style={{ position: 'relative', overflow: 'hidden' }}>
      {/* Radial glow */}
      <div className="hero-glow" />

      {/* Subtle horizontal scanline texture */}
      <div style={{
        position: 'absolute', inset: 0,
        background: 'repeating-linear-gradient(0deg, transparent, transparent 3px, rgba(255,255,255,0.006) 3px, rgba(255,255,255,0.006) 4px)',
        pointerEvents: 'none',
      }} />

      <div className="container">
        <div className="hero-grid">

          {/* Left: text */}
          <div>
            {/* Status badge */}
            <div className="hero-status">
              <span className="ping-wrap">
                <span className="ping-ring" />
                <span className="ping-core" />
              </span>
              Systems Active: Pampanga HQ
            </div>

            {/* Headline */}
            <h1 className="hero-title">
              Precision
              <span className="hero-title-accent">Retrofitting</span>
            </h1>

            {/* Sub */}
            <p className="hero-sub">
              Headlights + Android Headunits — Clean Wiring · Factory Fit · Zero Guesswork
            </p>

            {/* CTAs */}
            <div className="hero-ctas">
              <button className="btn-primary" onClick={scrollToContact}>
                Initiate Build
              </button>
              <button className="btn-secondary" onClick={scrollToServices}>
                View Schematics
              </button>
            </div>
          </div>

          {/* Right: lens element */}
          <LensElement />
        </div>
      </div>

      {/* Bottom scanline divider */}
      <div className="scanline-divider" style={{ marginTop: 16 }} />
    </section>
  );
}
