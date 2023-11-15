using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace PPE3_VELIBERTE
{
    public partial class FormCRUDBorne : Form
    {
        public FormCRUDBorne()
        {
            InitializeComponent();
        }

        /// <summary>
        /// gestion des caractères autorisés pour le numéro de la rue
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void tbnumAdresseRue_KeyPress(object sender, KeyPressEventArgs e)
        {
            if ((e.KeyChar < '0' || e.KeyChar > '9') && e.KeyChar != Convert.ToChar(Keys.Back))
            {
                MessageBox.Show("Erreur, vous devez saisir des chiffres", "Erreur", MessageBoxButtons.OK,
                     MessageBoxIcon.Error);
                e.Handled = true; // efface le dernier caractère saisi
            }

        }

        /// <summary>
        /// Interface de gestion des Bornes pour Ajouter/Modifier
        /// Feuille appelée via la formGestion
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void FormCRUDBorne_Load(object sender, EventArgs e)
        {

        }

        private void BtnOK_Click(object sender, EventArgs e)
        {
            
        }
    }
}
