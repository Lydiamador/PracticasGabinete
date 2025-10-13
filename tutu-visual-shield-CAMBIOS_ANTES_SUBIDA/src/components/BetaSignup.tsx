import { useState } from "react";
import { Button } from "@/components/ui/button";
import { Download } from "lucide-react";
import { createClient } from "@supabase/supabase-js";

const supabaseUrl = "https://pouiapnwlrhemfntvtxp.supabase.co";
const supabaseKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InBvdWlhcG53bHJoZW1mbnR2dHhwIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTkzOTIxNDEsImV4cCI6MjA3NDk2ODE0MX0.vFSwLOXNLu5xTzA0JJN1nV6m0BhQcKEnJBuK4VzETRw";
const supabase = createClient(supabaseUrl, supabaseKey);

export const BetaSignup = () => {
  const [correo, setCorreo] = useState("");
  const [mensaje, setMensaje] = useState("");
  const [mensajeColor, setMensajeColor] = useState("text-foreground/70");
  const [gdprAceptado, setGdprAceptado] = useState(false);

  const handleBetaSubmit = async () => {
    if (!correo) {
      setMensaje("Por favor ingresa un correo");
      setMensajeColor("text-red-500");
      return;
    }

    if (!gdprAceptado) {
      setMensaje("Debes aceptar la política de protección de datos.");
      setMensajeColor("text-red-500");
      return;
    }

    const { error } = await supabase
      .from("correos_Beta")
      .insert([{ correo }]);

    if (error) {
      if (error.code === "23505") {
        setMensaje("Este correo ya está registrado.");
      } else {
        setMensaje("Solo se permiten correos Gmail, Hotmail o Yahoo.");
      }
      setMensajeColor("text-red-500");
    } else {
      setMensaje("¡Gracias! Te has registrado en la beta.");
      setMensajeColor("text-green-500"); // ✅ Éxito en verde
      setCorreo("");
      setGdprAceptado(false);
    }
  };

  return (
    <section className="section-padding bg-muted/20">
      <div className="max-w-4xl mx-auto">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

          {/* Left Side - Beta Form */}
          <div className="glass-panel p-8">
            <h3 className="font-display text-3xl text-foreground mb-6">
              Únete a la Beta
            </h3>

            <div className="space-y-4">
              <p className="text-foreground/70 leading-relaxed">
                Regístrate para participar en la beta de protección de imágenes de menores.
              </p>

              <input
                type="email"
                placeholder="Correo electrónico"
                value={correo}
                onChange={(e) => setCorreo(e.target.value)}
                className="p-3 rounded border w-full"
              />

              {/* Casilla GDPR */}
              <label className="flex items-center gap-2 text-xs text-foreground/80 select-none">
                <input
                  type="checkbox"
                  checked={gdprAceptado}
                  onChange={(e) => setGdprAceptado(e.target.checked)}
                  className="w-2 h-2 accent-primary transform scale-50"
                />
                Acepto la política de protección de datos (GDPR)
              </label>

              <Button
                onClick={handleBetaSubmit}
                className="w-full bg-primary-gradient hover:shadow-lg hover:shadow-primary/30 text-white font-semibold transition-all duration-300"
              >
                Registrarme en Beta
              </Button>

              {mensaje && (
                <p className={`mt-2 text-sm text-center font-medium ${mensajeColor}`}>
                  {mensaje}
                </p>
              )}
            </div>

            <p className="text-xs text-foreground/60 mt-4">
              Te contactaremos por email. Protegemos tu privacidad según GDPR.
            </p>
          </div>

          {/* Right Side - Investor PDF */}
          <div className="glass-panel p-8 text-center">
            <h3 className="font-display text-2xl text-foreground mb-4">
              Para Inversores
            </h3>

            <p className="text-foreground/70 mb-6 leading-relaxed">
              Descarga nuestro one-pager con métricas de mercado, tecnología y oportunidad de inversión.
            </p>

            <Button
              id="investor-download-button"
              className="w-full bg-primary-gradient hover:shadow-lg hover:shadow-primary/30 text-white font-semibold transition-all duration-300"
              onClick={() => window.open('https://drive.google.com/file/d/1ffCtl9ggzllQAJgyE1uXM78YeGhl9jlg/view?usp=sharing', '_blank')}
            >
              <Download className="w-4 h-4 mr-2" />
              Descargar PDF Inversores
            </Button>
          </div>

        </div>
      </div>
    </section>
  );
};
