using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
using System.Data;
using System.Windows.Forms;

namespace PPE3_VELIBERTE
{
    /// <summary>
    /// classe Modele : gestion des données de la BD bd_ppe3_veliberte    
    /// </summary>
    public class Modele
    {
        #region propriétés

        private MySqlConnection myConnection;   // objet de connexion
        private bool connopen = false;          // test si la connexion est faite
        private bool errgrave = false;          // test si erreur lors de la connexion
        private bool chargement = false;        // test si le chargement d'une requête est fait

        // les DataAdapter et DataTable seront gérés dans des collections avec pour chaque un indice correspondant :
        // indice 0 : récupération des noms des tables
        // indice 1 : Table borne
        // indice 2 : Table adherent
        // indice 3 : Table ... à vous de créer la suite

        // collection de DataAdapter
        private List<MySqlDataAdapter> dA = new List<MySqlDataAdapter>();

        // collection de DataTable récupérant les données correspond au DA associé
        private List<DataTable> dT = new List<DataTable>();

        #endregion

        #region accesseurs
        /// <summary>
        /// test si la connexion à la BD est ouverte
        /// </summary>
        public bool Connopen
        {
            get { return connopen; }
            set { connopen = value; }
        }

        /// <summary>
        /// test si erreur lors de la connexion
        /// </summary>
        public bool Errgrave
        {
            get { return errgrave; }
            set { errgrave = value; }
        }

        /// <summary>
        /// test si le chargement d'une requête est fait
        /// </summary>
        public bool Chargement
        {
            get { return chargement; }
            set { chargement = value; }
        }

        /// <summary>
        /// Accesseur de la collection des DataAdapter
        /// </summary>
        public List<MySqlDataAdapter> DA
        {
            get { return dA; }
            set { dA = value; }
        }

        /// <summary>
        /// Accesseur de la collection des DataTable
        /// </summary>
        public List<DataTable> DT
        {
            get { return dT; }
            set { dT = value; }
        }
        #endregion

        /// <summary>
        /// Modele() : constructeur permettant l'ajout des DataAdpater et DataTable nécessaires (4 nécessaires pour l'existant actuel)
        /// indice 0 : récupération des noms des tables
        /// indice 1 : Table borne
        /// indice 2 : Table adherent
        /// indice 3 : Table ...
        /// </summary>
        public Modele()
        {
            // instanciation des collections des Datatable et DataAdapter
            for (int i = 0; i < 3 ; i++)
            {
                dA.Add(new MySqlDataAdapter());
                dT.Add(new DataTable());
            }
        }

        /// <summary>
        /// méthode seconnecter permettant la connexion à la BD : bd_ppe3_notagame
        /// </summary>
        public void seconnecter()
        {
            string myConnectionString = "Database=bd_ppe3_veliberte;Data Source=localhost;User Id=root;";
            myConnection = new MySqlConnection(myConnectionString);
            try // tentative 
            {
                myConnection.Open();
                connopen = true;
            }
            catch (Exception err)// gestion des erreurs
            {
                MessageBox.Show("Erreur ouverture BD Veliberte : " + err, "PBS connection", MessageBoxButtons.OK, MessageBoxIcon.Error);
                connopen = false; errgrave = true;
            }
        }

        /// <summary>
        /// méthode sedeconnecter pour se déconnecter à la BD
        /// </summary>
        public void sedeconnecter()
        {
            if (!connopen)
                return;
            try
            {
                myConnection.Close();
                myConnection.Dispose();
                connopen = false;
            }
            catch (Exception err)
            {
                MessageBox.Show("Erreur fermeture BD Veliberte : " + err, "PBS deconnection", MessageBoxButtons.OK, MessageBoxIcon.Error);
                errgrave = true;
            }
        }

        /// <summary>
        /// méthode générique privée pour charger le résultat d'une requête dans un dataTable via un dataAdapter
        /// Méthode appelée par charger_donnees(string table)
        /// </summary>
        /// <param name="requete">requete à charger</param>
        /// <param name="DT">dataTable</param>
        /// <param name="DA">dataAdapter</param>
        private void charger(string requete, DataTable DT, MySqlDataAdapter DA)
        {
            DA.SelectCommand = new MySqlCommand(requete, myConnection);

            // pour spécifier les instructions de mise à jour (insert, delete, update)
            MySqlCommandBuilder CB1 = new MySqlCommandBuilder(DA);
            try
            {
                DT.Clear();
                DA.Fill(DT);
                chargement = true;
            }
            catch (Exception err)
            {
                MessageBox.Show("Erreur chargement dataTable : " + err, "PBS table", MessageBoxButtons.OK, MessageBoxIcon.Error);
                errgrave = true;
            }
        }

        /// <summary>
        /// charge dans un DT les données de la table passée en paramètre
        /// </summary>
        /// <param name="table">nom de la table à requêter</param>
        public void charger_donnees(string table)
        {
            chargement = false;
            if (!connopen) return;		// pour vérifier que la BD est bien ouverte

            if (table == "toutes")
            {
                charger("show tables;", dT[0], dA[0]);
            }
            if (table == "borne")
            {
                charger("select * from borne;", dT[1], dA[1]);
            }
            if (table == "adherent")
            {
                charger("select * from adherent;", dT[2], dA[2]);
            }

        }
    }
}
