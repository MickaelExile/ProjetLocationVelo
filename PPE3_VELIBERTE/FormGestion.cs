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
    public partial class FormGestion : Form
    {
        private BindingSource bindingSource1;
        public FormGestion()
        {
            InitializeComponent();
        }

        /// <summary>
        /// Chargement de la feuille de gestion des données avec toutes les tables disponibles
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void FormGestion_Load(object sender, EventArgs e)
        {
            dgvDonnees.Visible = false; 
            Controleur.Vmodele.charger_donnees("toutes");

            if (Controleur.Vmodele.Chargement)
            {
                //   MessageBox.Show("BD chargée dans DataTable  : " + Controleur.Vmodele.DT1.Rows.Count.ToString());
                for (int i = 0; i < Controleur.Vmodele.DT[0].Rows.Count; i++)
                {
                    cbTables.Items.Add(Controleur.Vmodele.DT[0].Rows[i][0].ToString());
                }
            }
        }

        /// <summary>
        /// Fermeture de la feuille
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void BtnFermer_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        /// <summary>
        /// Chargement des données dans le dataGrifView selon la table sélectionnée
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void cbTables_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (cbTables.SelectedIndex != -1)
            {
                string table = cbTables.SelectedItem.ToString(); // récupération de la table sélectionnée
                Controleur.Vmodele.charger_donnees(table);      // chargement des données de la table sélectionné dans le DT correspondant
                if (Controleur.Vmodele.Chargement)
                {
                    // un DT par table
                    bindingSource1 = new BindingSource();
                    if (table == "borne")
                    {
                        bindingSource1.DataSource = Controleur.Vmodele.DT[1];
                        dgvDonnees.DataSource = bindingSource1;
                        dgvDonnees.Columns["codeB"].HeaderText = "Code";
                        dgvDonnees.Columns["nomB"].HeaderText = "Nom Borne";
                        dgvDonnees.Columns["numRueB"].HeaderText = "Numéro Rue";
                        dgvDonnees.Columns["nomRueB"].HeaderText = "Rue";
  
                    }
                    else if (table == "adherent")
                    {
                        bindingSource1.DataSource = Controleur.Vmodele.DT[2];
                        dgvDonnees.DataSource = bindingSource1;
                        dgvDonnees.Columns["numA"].HeaderText = "Numéro";
                        dgvDonnees.Columns["nomA"].HeaderText = "Nom";
                        dgvDonnees.Columns["prenomA"].HeaderText = "Préom";
                        dgvDonnees.Columns["adresseRueA"].HeaderText = "Adresse";
                        dgvDonnees.Columns["cpA"].HeaderText = "Code Postal";
                        dgvDonnees.Columns["villeA"].HeaderText = "Ville";
                        dgvDonnees.Columns["telA"].HeaderText = "Téléphone";

                    }

                    // mise à jour du dataGridView via le bindingSource rempli par le DataTable
                    dgvDonnees.Refresh();
                    dgvDonnees.Visible = true;
                }
                else
                {
                    MessageBox.Show("Table non gérée encore", "Avertissement", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                    dgvDonnees.Visible = false;
                }
            }
            else
            {
                MessageBox.Show("Selectionner une table dans la liste déroulante", "Erreur", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        /// <summary>
        /// Gestion du menu contextuel pour AJOUTER/SUPPRIMER/MODIFIER des données
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void contextMenuStrip1_Click(object sender, EventArgs e)
        {
            string table = cbTables.SelectedItem.ToString();
            if (sender == ajouterToolStripMenuItem)
            {
                // appel de la méthode du controleur en mode create

                if (table == "borne") Controleur.crud_borne('c', -1);
                if (table == "adherent") Controleur.crud_adherent('c', -1);
            }
            else
            {
                // vérifier qu’une ligne est bien sélectionnée dans le dataGridView
                if (dgvDonnees.SelectedRows.Count == 1)
                {
                    if (sender == modifierToolStripMenuItem)
                    {
                        if (table == "borne") Controleur.crud_borne('u', Convert.ToInt32(dgvDonnees.SelectedRows[0].Index));
                     //   if (table == "adherent") Controleur.crud_adherent('u', Convert.ToInt32(dgvDonnees.SelectedRows[0].Index));
                    }
                    if (sender == supprimerToolStripMenuItem)
                    {
                        if (table == "borne") Controleur.crud_borne('d', Convert.ToInt32(dgvDonnees.SelectedRows[0].Index));
                     //   if (table == "adherent") Controleur.crud_adherent('d', Convert.ToInt32(dgvDonnees.SelectedRows[0].Index));
                    }

                }
                else
                {
                    MessageBox.Show("Sélectionner une ligne à modifier/supprimer");
                }
            }

            // mise à jour du dataGridView en affichage     
            // appel de la méthode pour recharger toutes les données dans le DataGridView en cas d'ajout
            cbTables_SelectedIndexChanged(sender, e);
            bindingSource1.MoveLast();
            bindingSource1.MoveFirst();
            dgvDonnees.Refresh();

        }
    }
}
