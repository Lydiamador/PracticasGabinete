import { useEffect, useState } from "react";
import { createClient } from "@supabase/supabase-js";


// Inicializa Supabase
const supabaseUrl = "https://pouiapnwlrhemfntvtxp.supabase.co";
const supabaseKey =
  "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InBvdWlhcG53bHJoZW1mbnR2dHhwIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTkzOTIxNDEsImV4cCI6MjA3NDk2ODE0MX0.vFSwLOXNLu5xTzA0JJN1nV6m0BhQcKEnJBuK4VzETRw";
const supabase = createClient(supabaseUrl, supabaseKey);

const PrivacyPolicy = () => {
  const [correo, setCorreo] = useState("");
  const [mensaje, setMensaje] = useState("");
  const [mensajeColor, setMensajeColor] = useState("text-foreground/70");
  const [gdprAceptado, setGdprAceptado] = useState(false);

  useEffect(() => {
    document.title = "Política de Privacidad - Tu&Tu";
    const metaDescription = document.querySelector('meta[name="description"]');
    if (metaDescription) {
      metaDescription.setAttribute(
        "content",
        "Política de privacidad de Tu&Tu - Cómo protegemos tus datos en nuestra plataforma de protección digital."
      );
    }
  }, []);

  const handleRegistroCorreo = async () => {
    if (!correo) {
      setMensaje("Por favor ingresa un correo.");
      setMensajeColor("text-red-500");
      return;
    }

    if (!gdprAceptado) {
      setMensaje("Debes aceptar la política de protección de datos.");
      setMensajeColor("text-red-500");
      return;
    }

    const { error } = await supabase.from("correos_Privacidad").insert([{ correo }]);

    if (error) {
      if (error.code === "23505") {
        setMensaje("Este correo ya está registrado.");
      } else {
        setMensaje("Ocurrió un error: " + error.message);
      }
      setMensajeColor("text-red-500");
    } else {
      setMensaje("¡Gracias! Tu correo ha sido registrado.");
      setMensajeColor("text-green-500");
      setCorreo("");
      setGdprAceptado(false);
    }
  };

  return (
    <div className="min-h-screen bg-background text-foreground">
      {/* Header Section */}
      <div className="section-padding bg-background-secondary border-b border-border/20">
        <div className="container-grid">
          <div className="text-center max-w-3xl mx-auto">
            <h1 className="font-display text-4xl sm:text-5xl gradient-text mb-6">
              Política de Privacidad
            </h1>
            <p className="text-sm text-foreground/60">
              Fecha de entrada en vigor: 14 de julio de 2025
            </p>
            
          </div>
        </div>
      </div>

      {/* Content Section */}
      <div className="section-padding">
        <div className="container-grid">
          <div className="max-w-4xl mx-auto">
            <div className="prose prose-invert max-w-none">
              {/* TODAS TUS SECCIONES ORIGINALES */}
              {/* Section 1 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  1. Responsable del tratamiento
                </h2>
                <div className="glass-panel p-6">
                  <div className="space-y-3 text-foreground/80">
                    <p><strong>Identidad:</strong> TU&TU – Protección Digital S.L.</p>
                    <p><strong>Correo electrónico de contacto:</strong> privacidad@tuytu.tech</p>
                    <p><strong>Finalidad del tratamiento:</strong> Proteger la privacidad digital de menores y colectivos vulnerables mediante una tecnología de protección cuántica de imágenes.</p>
                  </div>
                </div>
              </section>

              {/* Section 2 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  2. Datos que recopilamos
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed mb-4">
                    TU&TU solo recopila los datos estrictamente necesarios para el funcionamiento del servicio, que pueden incluir:
                  </p>
                  <ul className="list-disc list-inside space-y-3 text-foreground/80 ml-4">
                    <li>Correo electrónico de contacto (en caso de suscripción a la beta o contacto directo).</li>
                    <li>Dirección IP, tipo de navegador y configuración de idioma (mediante cookies técnicas y analíticas).</li>
                    <li>Imágenes proporcionadas por el usuario para su protección (procesadas y no almacenadas, salvo consentimiento expreso para pruebas o mejoras).</li>
                  </ul>
                </div>
              </section>

              {/* Section 3 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  3. Finalidades del tratamiento
                </h2>
                <div className="glass-panel p-6">
                  <ul className="list-disc list-inside space-y-3 text-foreground/80">
                    <li>Permitir el acceso y uso de nuestra plataforma de protección digital.</li>
                    <li>Enviar información relacionada con el servicio si el usuario lo ha autorizado (por ejemplo, noticias de la beta o avances tecnológicos).</li>
                    <li>Mejorar el rendimiento, seguridad y usabilidad del sitio web.</li>
                    <li>Cumplir con obligaciones legales.</li>
                  </ul>
                </div>
              </section>

              {/* Section 4 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  4. Base legal del tratamiento
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed mb-4">
                    El tratamiento de datos se basa en:
                  </p>
                  <ul className="list-disc list-inside space-y-3 text-foreground/80 ml-4">
                    <li>El consentimiento del usuario.</li>
                    <li>El interés legítimo del responsable en garantizar el funcionamiento seguro del sitio.</li>
                    <li>El cumplimiento de obligaciones legales aplicables.</li>
                  </ul>
                </div>
              </section>

              {/* Section 5 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  5. Conservación de datos
                </h2>
                <div className="glass-panel p-6">
                  <div className="space-y-4 text-foreground/80 leading-relaxed">
                    <p>Los datos personales proporcionados se conservarán mientras se mantenga la relación con el usuario o hasta que este solicite su supresión.</p>
                    <p>Las imágenes subidas para protección se eliminan tras el procesamiento salvo consentimiento explícito para conservarlas temporalmente en el entorno de pruebas.</p>
                  </div>
                </div>
              </section>

              {/* Section 6 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  6. Cesión de datos a terceros
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed">
                    TU&TU no vende, alquila ni cede datos personales a terceros. En caso de integraciones con plataformas educativas o redes sociales, se garantizará siempre un acuerdo previo con cláusulas de protección de datos.
                  </p>
                </div>
              </section>

              {/* Section 7 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  7. Derechos del usuario
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed mb-4">
                    Puedes ejercer los siguientes derechos:
                  </p>
                  <ul className="list-disc list-inside space-y-3 text-foreground/80 ml-4 mb-6">
                    <li><strong>Acceso:</strong> Saber qué datos tenemos sobre ti.</li>
                    <li><strong>Rectificación:</strong> Corregir errores en tus datos.</li>
                    <li><strong>Supresión:</strong> Eliminar tus datos personales.</li>
                    <li><strong>Oposición:</strong> Oponerte al tratamiento de tus datos.</li>
                    <li><strong>Limitación del tratamiento y portabilidad de los datos.</strong></li>
                  </ul>
                  <div className="bg-background-tertiary p-4 rounded-lg border-l-4 border-brand-blue">
                    <p className="text-foreground/80 leading-relaxed">
                      Para ejercer estos derechos, escribe a <strong>protegeme@tuytu.tech</strong> indicando tu solicitud y adjuntando una copia de tu documento de identidad.
                    </p>
                  </div>
                </div>
              </section>

              {/* Section 8 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  8. Medidas de seguridad
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed">
                    TU&TU aplica medidas técnicas y organizativas adecuadas para garantizar la seguridad de los datos, como cifrado, servidores seguros y procesamiento local sin almacenamiento de imágenes por defecto.
                  </p>
                </div>
              </section>

              {/* Section 9 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  9. Cambios en la política de privacidad
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed">
                    Nos reservamos el derecho a modificar esta política para adaptarla a novedades legislativas o mejoras del servicio. Se informará a los usuarios en caso de cambios significativos.
                  </p>
                </div>
              </section>

              {/* Section 10 */}
              <section className="mb-12">
                <h2 className="font-display text-2xl gradient-text mb-6">
                  10. Autoridad de control
                </h2>
                <div className="glass-panel p-6">
                  <p className="text-foreground/80 leading-relaxed">
                    Si consideras que tus derechos no han sido debidamente atendidos, puedes presentar una reclamación ante la Agencia Española de Protección de Datos (<a href="https://www.aepd.es" target="_blank" rel="noopener noreferrer" className="text-brand-blue hover:text-brand-blue/80 underline">www.aepd.es</a>).
                  </p>
                  <p className="text-sm text-foreground/60 mt-4">
                    Última actualización: 14 de julio de 2025
                  </p>
                </div>
              </section>
            </div>

            {/* Formulario de registro de correo */}
            <div className="mt-16 text-center">
              <div className="glass-panel-strong p-8">
                <h3 className="font-display text-xl gradient-text mb-4">
                  Regístrate para recibir información
                </h3>
                <p className="text-foreground/70 mb-6">
                  Ingresa tu correo para que podamos enviarte la información que estás buscando.
                </p>
                <div className="flex flex-col sm:flex-row gap-4 justify-center">
                  <input
                    type="email"
                    placeholder="Correo electrónico"
                    value={correo}
                    onChange={(e) => setCorreo(e.target.value)}
                    className="p-3 rounded border w-full sm:w-auto"
                  />
                  <button
                    onClick={handleRegistroCorreo}
                    className="px-6 py-3 bg-brand-blue hover:bg-brand-blue/90 text-white rounded-lg transition-colors"
                  >
                    Registrarme
                  </button>
                </div>

                {/* Checkbox GDPR */}
                <label className="flex items-center gap-2 mt-4 text-xs text-foreground/80 select-none justify-center">
                  <input
                    type="checkbox"
                    checked={gdprAceptado}
                    onChange={(e) => setGdprAceptado(e.target.checked)}
                  className="w-2 h-2 accent-primary transform scale-50"
                  />
                  Acepto la política de protección de datos (GDPR)
                </label>

                {/* Mensaje */}
                {mensaje && (
                  <p className={`text-sm mt-4 ${mensajeColor}`}>{mensaje}</p>
                )}
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  );
};

export default PrivacyPolicy;