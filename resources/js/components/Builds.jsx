import React from 'react';

const BUILDS = [
  {
    src: 'https://images.unsplash.com/photo-1600705591462-80ba4e851d7e?q=80&w=700&auto=format&fit=crop',
    alt: 'Headlight retrofit build',
    tag: 'OPTICS',
    caption: '> ICE BLUE DEMON EYES — CLEAN CUTOFF',
  },
  {
    src: 'https://images.unsplash.com/photo-1544829728-e5cb9eedc20e?q=80&w=700&auto=format&fit=crop',
    alt: 'Android headunit install',
    tag: 'INTERFACE',
    caption: '> ANDROID HEADUNIT — WIRELESS CARPLAY ACTIVE',
  },
  {
    src: 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=700&auto=format&fit=crop',
    alt: 'Completed car build',
    tag: 'DELIVERY',
    caption: '> DRL + FOGLIGHTS ALIGNED — READY FOR PICKUP',
  },
  {
    src: 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=700&auto=format&fit=crop',
    alt: 'LED retrofit',
    tag: 'OPTICS',
    caption: '> AMBER ANGEL EYES — PROJECTOR SWAP',
  },
  {
    src: 'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?q=80&w=700&auto=format&fit=crop',
    alt: 'Modern car interior',
    tag: 'INTERFACE',
    caption: '> 360 CAM + HEADUNIT COMBO — FULL INSTALL',
  },
  {
    src: null,
    alt: 'More builds on Facebook',
    tag: 'ARCHIVE',
    caption: '> FOLLOW FOR MORE BUILDS',
    isPlaceholder: true,
  },
];

export default function Builds() {
  return (
    <section id="work" className="builds-section">
      <div className="container">

        {/* Header row */}
        <div className="builds-header">
          <div>
            <p className="section-num">// SECTION 03 — RECENT ARCHIVE</p>
            <h2 className="section-title">
              Latest <span style={{ color: 'var(--accent-h)' }}>Builds</span>
            </h2>
          </div>
          <a
            href="https://www.facebook.com/1625autolab"
            target="_blank"
            rel="noopener noreferrer"
            className="btn-fb"
          >
            Follow 1625 →
          </a>
        </div>

        {/* Grid */}
        <div className="builds-grid">
          {BUILDS.map((b, i) => (
            <div key={i} className="build-card">
              {b.isPlaceholder ? (
                <a
                  href="https://www.facebook.com/1625autolab"
                  target="_blank"
                  rel="noopener noreferrer"
                  style={{ display: 'block', width: '100%', height: '100%' }}
                >
                  <div className="build-placeholder">
                    <div style={{ textAlign: 'center' }}>
                      <div style={{ fontSize: '2rem', marginBottom: 8 }}>📷</div>
                      <div>View all builds</div>
                      <div style={{ color: 'var(--accent-h)', marginTop: 4 }}>@ Facebook</div>
                    </div>
                  </div>
                </a>
              ) : (
                <>
                  <img src={b.src} alt={b.alt} className="build-img" loading="lazy" />
                  <div className="build-overlay">
                    <span style={{
                      fontFamily: 'IBM Plex Mono, monospace',
                      fontSize: '0.6rem',
                      letterSpacing: '0.18em',
                      color: 'var(--accent-h)',
                      marginBottom: 4,
                      display: 'block',
                    }}>
                      [{b.tag}]
                    </span>
                    <span className="build-caption">{b.caption}</span>
                  </div>
                </>
              )}
            </div>
          ))}
        </div>

      </div>
      <div className="scanline-divider" style={{ marginTop: 80 }} />
    </section>
  );
}
