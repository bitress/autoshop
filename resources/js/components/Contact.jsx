import React, { useState } from 'react';

const SERVICES = [
  'Headlight Retrofit',
  'Android Headunit Installation',
  'Both (Retrofit + Headunit)',
  'Other / Inquiry',
];

const EMPTY = {
  name: '', phone: '', email: '',
  vehicle: '', service: SERVICES[0],
  location: 'shop', requests: '',
};

export default function Contact() {
  const [form,    setForm]    = useState(EMPTY);
  const [errors,  setErrors]  = useState({});
  const [status,  setStatus]  = useState('idle'); // idle | loading | success | error
  const [errMsg,  setErrMsg]  = useState('');

  const set = (field) => (e) => setForm(f => ({ ...f, [field]: e.target.value }));

  const validate = () => {
    const e = {};
    if (!form.name.trim())  e.name  = 'Name is required.';
    if (!form.phone.trim()) e.phone = 'Phone is required.';
    if (!form.email.trim() || !/\S+@\S+\.\S+/.test(form.email)) e.email = 'Valid email required.';
    return e;
  };

  const handleSubmit = async (ev) => {
    ev.preventDefault();
    const e = validate();
    if (Object.keys(e).length) { setErrors(e); return; }
    setErrors({});
    setStatus('loading');

    try {
      const res = await fetch('/api/book', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(form),
      });
      if (!res.ok) {
        const data = await res.json();
        throw new Error(data.message || 'Server error.');
      }
      setStatus('success');
      setForm(EMPTY);
    } catch (err) {
      setErrMsg(err.message || 'Something went wrong. Please try again.');
      setStatus('error');
    }
  };

  return (
    <section id="contact" className="contact-section">

      {/* ── Left: dark info panel ─────────────────────────── */}
      <div className="contact-info">
        <p className="section-num" style={{ marginBottom: 12 }}>// SECTION 05 — LOCATE THE LAB</p>
        <h2 className="contact-heading">
          Visit The <span>Lab</span>
        </h2>

        <ul className="contact-detail-list">
          <li className="contact-detail-item">
            <span className="contact-detail-icon">📍</span>
            <div>
              <p className="contact-detail-label">Address</p>
              <p className="contact-detail-value">
                <strong>NKKS Arcade</strong><br />
                Brgy. Alasas, San Fernando, Pampanga<br />
                <a
                  href="https://waze.com/ul?q=1625+Autolab"
                  target="_blank"
                  rel="noopener noreferrer"
                  style={{ fontSize: '0.8rem' }}
                >
                  ↗ Waze: 1625 Autolab
                </a>
              </p>
            </div>
          </li>
          <li className="contact-detail-item">
            <span className="contact-detail-icon">📞</span>
            <div>
              <p className="contact-detail-label">Contact Numbers</p>
              <p className="contact-detail-value">
                0991 940 7307<br />
                0995 258 1474<br />
                0956 450 0292
              </p>
            </div>
          </li>
          <li className="contact-detail-item">
            <span className="contact-detail-icon">📘</span>
            <div>
              <p className="contact-detail-label">Social</p>
              <p className="contact-detail-value">
                <a
                  href="https://www.facebook.com/1625autolab"
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  facebook.com/1625autolab
                </a>
              </p>
            </div>
          </li>
        </ul>

        <div className="home-service-box">
          <p className="home-service-title">🚐 Home Service Available</p>
          <p className="home-service-text">
            Can't make it to Pampanga? Ask about our "Visiting the South"
            schedule for in-home installations. Subject to availability.
          </p>
        </div>
      </div>

      {/* ── Right: white intake form ──────────────────────── */}
      <div className="contact-form-side">

        {status === 'success' ? (
          <div className="form-success">
            <div className="form-success-icon">✅</div>
            <h3 className="form-success-title">Build Request Received</h3>
            <p className="form-success-msg">
              Our team will reach out via your contact details to confirm your slot. See you at the lab!
            </p>
            <button
              onClick={() => setStatus('idle')}
              style={{
                marginTop: 24,
                fontFamily: 'IBM Plex Mono, monospace',
                fontSize: '0.7rem',
                letterSpacing: '0.15em',
                textTransform: 'uppercase',
                background: 'transparent',
                border: '1px solid #7C3AED',
                color: '#7C3AED',
                padding: '10px 24px',
                cursor: 'pointer',
              }}
            >
              Submit Another
            </button>
          </div>
        ) : (
          <>
            <h3 className="form-heading">System Intake Form</h3>
            <p className="form-sub">// Fill out your build request below</p>

            <form className="intake-form" onSubmit={handleSubmit} noValidate>

              {/* Row 1: name + phone */}
              <div className="form-row">
                <div className="form-field">
                  <label className="form-label">Full Name <span>*</span></label>
                  <input
                    className="form-input"
                    type="text"
                    placeholder="Juan Dela Cruz"
                    value={form.name}
                    onChange={set('name')}
                  />
                  {errors.name && <span className="form-error">{errors.name}</span>}
                </div>
                <div className="form-field">
                  <label className="form-label">Contact Number <span>*</span></label>
                  <input
                    className="form-input"
                    type="tel"
                    placeholder="09XX XXX XXXX"
                    value={form.phone}
                    onChange={set('phone')}
                  />
                  {errors.phone && <span className="form-error">{errors.phone}</span>}
                </div>
              </div>

              {/* Row 2: email + vehicle */}
              <div className="form-row">
                <div className="form-field">
                  <label className="form-label">Email Address <span>*</span></label>
                  <input
                    className="form-input"
                    type="email"
                    placeholder="you@email.com"
                    value={form.email}
                    onChange={set('email')}
                  />
                  {errors.email && <span className="form-error">{errors.email}</span>}
                </div>
                <div className="form-field">
                  <label className="form-label">Vehicle Make / Model / Year</label>
                  <input
                    className="form-input"
                    type="text"
                    placeholder="e.g. Toyota Fortuner 2020"
                    value={form.vehicle}
                    onChange={set('vehicle')}
                  />
                </div>
              </div>

              {/* Service select */}
              <div className="form-field">
                <label className="form-label">Service Required <span>*</span></label>
                <select className="form-select" value={form.service} onChange={set('service')}>
                  {SERVICES.map(s => <option key={s} value={s}>{s}</option>)}
                </select>
              </div>

              {/* Location radio cards */}
              <div className="form-field">
                <label className="form-label">Location Preference <span>*</span></label>
                <div className="location-cards">
                  <label className={`location-card-label ${form.location === 'shop' ? 'selected' : ''}`}>
                    <input type="radio" name="location" value="shop" checked={form.location === 'shop'} onChange={set('location')} />
                    <span className="location-radio-icon">🏪</span>
                    <span>
                      <span className="location-card-name">Shop Service</span>
                      <span className="location-card-sub">San Fernando, Pampanga</span>
                    </span>
                  </label>
                  <label className={`location-card-label ${form.location === 'home' ? 'selected' : ''}`}>
                    <input type="radio" name="location" value="home" checked={form.location === 'home'} onChange={set('location')} />
                    <span className="location-radio-icon">🚐</span>
                    <span>
                      <span className="location-card-name">Home Service</span>
                      <span className="location-card-sub">Subject to availability</span>
                    </span>
                  </label>
                </div>
              </div>

              {/* Specific requests */}
              <div className="form-field">
                <label className="form-label">Specific Requests</label>
                <textarea
                  className="form-textarea"
                  placeholder="Demon Eye color preference, headunit specs, or any other details..."
                  value={form.requests}
                  onChange={set('requests')}
                />
              </div>

              {/* Server error */}
              {status === 'error' && (
                <p className="form-error" style={{ fontSize: '0.82rem' }}>{errMsg}</p>
              )}

              {/* Submit */}
              <button type="submit" className="btn-submit" disabled={status === 'loading'}>
                {status === 'loading' ? 'Processing...' : 'Submit Build Request'}
              </button>

            </form>
          </>
        )}
      </div>

    </section>
  );
}
